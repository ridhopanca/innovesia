<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
    public function index()
    {
        $generalInfo = GeneralInformation::first();
        return view('admin.general-information.index', compact('generalInfo'));
    }

    public function edit()
    {
        $generalInfo = GeneralInformation::first();
        return view('admin.general-information.edit', compact('generalInfo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.svg' => 'nullable|string',
            'items.*.url' => 'required|string',
            'items.*.label' => 'required|string|max:255',
            'items.*.sublabel' => 'nullable|string|max:255',
        ]);

        $generalInfo = GeneralInformation::first();
        if (!$generalInfo) {
            $generalInfo = GeneralInformation::create($validated);
        } else {
            $generalInfo->update($validated);
        }

        return redirect()->route('admin.pages.index')
            ->with('success', 'General information updated successfully.');
    }
}
