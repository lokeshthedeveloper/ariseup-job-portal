<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Models\Component;
use Illuminate\Http\Request;

class ThemeComponentController extends Controller
{
    /**
     * Display a listing of theme-component relationships.
     */
    public function index()
    {
        $themes = Theme::with('components')->where('status', true)->get();
        return view('admin.theme.theme-components.index', compact('themes'));
    }

    /**
     * Show the form for managing theme components.
     */
    public function edit(Theme $theme)
    {
        $components = Component::where('status', true)->get();
        $selectedComponents = $theme->components->pluck('id')->toArray();

        return view('admin.theme.theme-components.edit', compact('theme', 'components', 'selectedComponents'));
    }

    /**
     * Update theme components.
     */
    public function update(Request $request, Theme $theme)
    {
        $validated = $request->validate([
            'components' => 'nullable|array',
            'components.*' => 'exists:components,id',
        ]);

        // Sync components (this will add new and remove old ones)
        $theme->components()->sync($validated['components'] ?? []);

        return redirect()->route('admin.theme-components.index')
            ->with('success', 'Theme components updated successfully.');
    }

    /**
     * Attach a component to a theme.
     */
    public function attach(Request $request, Theme $theme)
    {
        $validated = $request->validate([
            'component_id' => 'required|exists:components,id',
        ]);

        if (!$theme->components()->where('component_id', $validated['component_id'])->exists()) {
            $theme->components()->attach($validated['component_id']);
            return back()->with('success', 'Component attached successfully.');
        }

        return back()->with('error', 'Component already attached to this theme.');
    }

    /**
     * Detach a component from a theme.
     */
    public function detach(Theme $theme, Component $component)
    {
        $theme->components()->detach($component->id);

        return back()->with('success', 'Component detached successfully.');
    }
}
