<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends Controller
{
    /**
     * Display a listing of themes.
     */
    public function index()
    {
        $themes = Theme::withCount('components')->latest()->paginate(15);
        return view('admin.theme.themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new theme.
     */
    public function create()
    {
        return view('admin.theme.themes.create');
    }

    /**
     * Store a newly created theme.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:themes,slug',
            'status' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['status'] = $request->has('status');

        Theme::create($validated);

        return redirect()->route('admin.themes.index')
            ->with('success', 'Theme created successfully.');
    }

    /**
     * Show the form for editing the specified theme.
     */
    public function edit(Theme $theme)
    {
        return view('admin.theme.themes.edit', compact('theme'));
    }

    /**
     * Update the specified theme.
     */
    public function update(Request $request, Theme $theme)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:themes,slug,' . $theme->id,
            'status' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['status'] = $request->has('status');

        $theme->update($validated);

        return redirect()->route('admin.themes.index')
            ->with('success', 'Theme updated successfully.');
    }

    /**
     * Remove the specified theme.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect()->route('admin.themes.index')
            ->with('success', 'Theme deleted successfully.');
    }

    /**
     * Toggle theme status.
     */
    public function toggleStatus(Theme $theme)
    {
        $theme->update(['status' => !$theme->status]);

        return redirect()->route('admin.themes.index')
            ->with('success', 'Theme status updated successfully.');
    }
}
