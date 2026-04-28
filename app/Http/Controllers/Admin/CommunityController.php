<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.communities.index', compact('communities'));
    }

    public function create()
    {
        return view('admin.communities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:communities',
            'badge' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'primary_button' => 'nullable|string|max:255',
            'secondary_button' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'program_data' => 'nullable|array',
            'timeline_data' => 'nullable|array',
            'documentation_images' => 'nullable|array',
            'documentation_data' => 'nullable|array',
            'prototype_projects' => 'nullable|array',
            'video_data' => 'nullable|array',
            'cta_data' => 'nullable|array',
            'video_title' => 'nullable|string|max:255',
            'video_subtitle' => 'nullable|string|max:255',
            'video_image' => 'nullable|string',
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_primary_button' => 'nullable|string|max:255',
            'cta_secondary_button' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer'
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['order'] = $validated['order'] ?? 0;

        Community::create($validated);

        $redirectUrl = $request->input('referrer', route('admin.communities.index'));
        return redirect($redirectUrl)->with('success', 'Community created successfully');
    }

    public function edit($id)
    {
        $community = Community::findOrFail($id);
        return view('admin.communities.edit', compact('community'));
    }

    public function update(Request $request, $id)
    {
        $community = Community::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:communities,slug,' . $id,
            'badge' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'primary_button' => 'nullable|string|max:255',
            'secondary_button' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'program_data' => 'nullable|array',
            'timeline_data' => 'nullable|array',
            'documentation_images' => 'nullable|array',
            'documentation_data' => 'nullable|array',
            'prototype_projects' => 'nullable|array',
            'video_data' => 'nullable|array',
            'cta_data' => 'nullable|array',
            'video_title' => 'nullable|string|max:255',
            'video_subtitle' => 'nullable|string|max:255',
            'video_image' => 'nullable|string',
            'cta_title' => 'nullable|string|max:255',
            'cta_description' => 'nullable|string',
            'cta_primary_button' => 'nullable|string|max:255',
            'cta_secondary_button' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer'
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['order'] = $validated['order'] ?? 0;

        $community->update($validated);

        $redirectUrl = $request->input('referrer', route('admin.communities.index'));
        return redirect($redirectUrl)->with('success', 'Community updated successfully');
    }

    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        $community->delete();

        return redirect()->route('admin.communities.index')->with('success', 'Community deleted successfully');
    }
}
