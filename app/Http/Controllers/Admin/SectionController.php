<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function updateDraft(Request $request, Section $section)
    {
        $data = $request->except(['_token', 'image_source', 'image_file']);

        if ($request->input('image_source') === 'url') {
            $data['image'] = $request->input('image');
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads', 'public');
            $data['image'] = $path;
        }


        if (isset($data['items'])) {
            $section->draft_content = $data['items'];
        } else {
            $section->draft_content = $data;
        }

        $section->save();

        return response()->json(['status' => 'ok']);
    }
}
