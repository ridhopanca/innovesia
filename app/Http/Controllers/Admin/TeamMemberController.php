<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.team-members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published'
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        TeamMember::create($validated);

        $referrer = $request->input('referrer');
        return redirect($referrer ?? route('admin.team-members.index'))->with('success', 'Team member created successfully');
    }

    public function edit($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team-members.edit', compact('teamMember'));
    }

    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:draft,published'
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $teamMember->update($validated);

        $referrer = $request->input('referrer');
        return redirect($referrer ?? route('admin.team-members.index'))->with('success', 'Team member updated successfully');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted successfully');
    }
}
