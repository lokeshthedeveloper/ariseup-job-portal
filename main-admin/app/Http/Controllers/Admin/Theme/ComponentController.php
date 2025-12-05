<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComponentController extends Controller
{
    /**
     * Display a listing of components.
     */
    public function index()
    {
        $components = Component::withCount('themes')->latest()->paginate(15);
        return view('admin.theme.components.index', compact('components'));
    }

    /**
     * Show the form for creating a new component.
     */
    public function create()
    {
        return view('admin.theme.components.create');
    }

    /**
     * Store a newly created component.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:components,slug',
            'status' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['status'] = $request->has('status');

        Component::create($validated);

        return redirect()->route('admin.components.index')
            ->with('success', 'Component created successfully.');
    }

    /**
     * Show the form for editing the specified component.
     */
    public function edit(Component $component)
    {
        return view('admin.theme.components.edit', compact('component'));
    }

    /**
     * Update the specified component.
     */
    public function update(Request $request, Component $component)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:components,slug,' . $component->id,
            'status' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['status'] = $request->has('status');

        $component->update($validated);

        return redirect()->route('admin.components.index')
            ->with('success', 'Component updated successfully.');
    }

    /**
     * Remove the specified component.
     */
    public function destroy(Component $component)
    {
        $component->delete();

        return redirect()->route('admin.components.index')
            ->with('success', 'Component deleted successfully.');
    }

    /**
     * Toggle component status.
     */
    public function toggleStatus(Component $component)
    {
        $component->update(['status' => !$component->status]);

        return redirect()->route('admin.components.index')
            ->with('success', 'Component status updated successfully.');
    }
}
