<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // List semua page
    public function index()
    {
        $pages = Page::with('sections')->get()->map(function ($page) {
            // Cek apakah ada section dengan draft (unpublished changes)
            $hasDraftSection = $page->sections->contains(function ($section) {
                return !empty($section->draft_content);
            });

            // Cek apakah ada content yang sudah pernah di-publish
            $hasPublishedContent = $page->sections->contains(function ($section) {
                return !empty($section->content);
            });

            // Tentukan display status
            if ($hasDraftSection && $hasPublishedContent) {
                $page->display_status = 'modified'; // Sudah publish tapi ada perubahan draft
            } elseif ($hasDraftSection && !$hasPublishedContent) {
                $page->display_status = 'draft'; // Belum pernah publish
            } else {
                $page->display_status = 'published'; // Tidak ada draft
            }

            // Hitung unique section types (untuk display yang akurat)
            $page->unique_sections_count = $page->sections->unique('type')->count();

            return $page;
        });

        return view('admin.pages.index', compact('pages'));
    }

    // Edit page (split editor + preview)
    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        // Group sections by type to prevent duplicates (take first if multiple exist)
        $sections = $page->sections()->get()->keyBy('type');

        return view('admin.pages.edit', compact('page', 'sections'));
    }

    // Publish semua draft (copy draft ke content, draft di-clear)
    public function publish($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        foreach ($page->sections as $section) {
            if ($section->draft_content) {
                $section->content = $section->draft_content;
                $section->draft_content = null; // Clear draft setelah publish
                $section->save();
            }
        }

        $page->status = 'published';
        $page->published_at = now();
        $page->save();

        return back()->with('success', 'Page published');
    }
}
