<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $section->is_visible = $request->has('is_visible');

        $section->save();

        // Invalidate cache for the page this section belongs to (ignore errors)
        try {
            $page = $section->page;
            if ($page) {
                Cache::forget("page_{$page->slug}");
            }
        } catch (\Exception $e) {
            // Ignore cache errors
        }

        return response()->json(['status' => 'ok']);
    }
}
