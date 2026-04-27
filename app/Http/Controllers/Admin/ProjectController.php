<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects',
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'stats' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer'
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['order'] = $validated['order'] ?? 0;

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $id,
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|string',
            'stats' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'order' => 'nullable|integer'
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['order'] = $validated['order'] ?? 0;

        $project->update($validated);

        $redirectUrl = $request->input('referrer', route('admin.projects.index'));
        return redirect($redirectUrl)->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully');
    }
}
