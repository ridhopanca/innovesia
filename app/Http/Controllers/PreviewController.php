<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PreviewController extends Controller
{
    public function show(Page $page)
    {
        $sections = $page->sections->mapWithKeys(function ($section) {
            return [$section->type => $section->draft_content ?? $section->content ?? []];
        });

        return view('pages.preview', compact('page', 'sections'));
    }
}
