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

        $isPreview = true;

        // For pages with custom controller methods, use the actual page view
        if ($page->slug === 'our-work') {
            $featuredProject = \App\Models\Project::published()->featured()->first();
            $projects = \App\Models\Project::published()->where('is_featured', false)->ordered()->get();
            return view('pages.our-work', compact('page', 'sections', 'featuredProject', 'projects', 'isPreview'));
        }

        if ($page->slug === 'strategic-capabilities') {
            return view('pages.strategic-capabilities', compact('page', 'sections', 'isPreview'));
        }

        if ($page->slug === 'collective-structure') {
            $teamMembers = \App\Models\TeamMember::published()->ordered()->paginate(9);
            return view('pages.collective-structure', compact('page', 'sections', 'teamMembers', 'isPreview'));
        }

        return view('pages.preview', compact('page', 'sections', 'isPreview'));
    }
}
