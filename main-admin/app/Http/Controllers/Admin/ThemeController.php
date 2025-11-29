<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::latest()->paginate(10);
        return view('admin.themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectionTypes = Theme::SECTION_TYPES;
        return view('admin.themes.create', compact('sectionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'theme_name' => 'required|string|max:255',
            'section_type' => 'required|string',
            'view_file' => 'required|string|max:255',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('screenshot')) {
            $imageName = time() . '.' . $request->screenshot->extension();
            $request->screenshot->move(public_path('uploads/themes'), $imageName);
            $data['screenshot'] = 'uploads/themes/' . $imageName;
        }

        Theme::create($data);

        return redirect()->route('admin.themes.index')->with('success', 'Theme created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        $sectionTypes = Theme::SECTION_TYPES;
        return view('admin.themes.edit', compact('theme', 'sectionTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'theme_name' => 'required|string|max:255',
            'section_type' => 'required|string',
            'view_file' => 'required|string|max:255',
            'screenshot' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('screenshot')) {
            $imageName = time() . '.' . $request->screenshot->extension();
            $request->screenshot->move(public_path('uploads/themes'), $imageName);
            $data['screenshot'] = 'uploads/themes/' . $imageName;
        }

        $theme->update($data);

        return redirect()->route('admin.themes.index')->with('success', 'Theme updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('admin.themes.index')->with('success', 'Theme deleted successfully.');
    }
}
