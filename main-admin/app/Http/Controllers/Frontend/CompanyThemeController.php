<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyThemeController extends Controller
{
    /**
     * Display theme selection page
     */
    public function index()
    {
        $user = Auth::user();
        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')
                ->with('error', 'Company profile not found.');
        }

        // Get all active themes with their components
        $themes = Theme::where('status', true)
            ->with(['components' => function ($query) {
                $query->where('status', true);
            }])
            ->get();

        // Get company's current selections
        $selectedTheme = DB::table('company_selected_themes')
            ->where('company_id', $company->id)
            ->value('theme_id');

        $selectedComponents = DB::table('company_selected_components')
            ->where('company_id', $company->id)
            ->get(['component_id', 'theme_id'])
            ->pluck('theme_id', 'component_id')
            ->toArray();

        // Debug: Log what we're loading
        \Log::info('Loading theme selections for company ' . $company->id, [
            'selected_theme' => $selectedTheme,
            'selected_components' => $selectedComponents,
        ]);

        return view('company.theme.index', compact('themes', 'selectedTheme', 'selectedComponents', 'company'));
    }

    /**
     * Update company theme and component selections
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')
                ->with('error', 'Company profile not found.');
        }

        // Debug: Log what we received in the request
        \Log::info('Received theme update request', [
            'company_id' => $company->id,
            'theme_id' => $request->input('theme_id'),
            'components' => $request->input('components'),
            'all_request_data' => $request->all(),
        ]);

        $validated = $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'components' => 'nullable|array',
            'components.*.component_id' => 'required|exists:components,id',
            'components.*.theme_id' => 'required|exists:themes,id',
        ]);

        // Verify selected theme is active
        $theme = Theme::where('id', $validated['theme_id'])
            ->where('status', true)
            ->first();

        if (!$theme) {
            return back()->with('error', 'Selected theme is not available.');
        }

        DB::beginTransaction();
        try {
            // Update theme selection (delete old and insert new)
            DB::table('company_selected_themes')
                ->where('company_id', $company->id)
                ->delete();

            DB::table('company_selected_themes')->insert([
                'company_id' => $company->id,
                'theme_id' => $validated['theme_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update component selections
            DB::table('company_selected_components')
                ->where('company_id', $company->id)
                ->delete();

            if (!empty($validated['components'])) {
                $componentData = [];
                foreach ($validated['components'] as $componentSelection) {
                    $componentId = $componentSelection['component_id'];
                    $themeId = $componentSelection['theme_id'];

                    // Verify component exists and is active
                    $component = Component::where('id', $componentId)
                        ->where('status', true)
                        ->first();

                    // Verify theme exists and is active
                    $componentTheme = Theme::where('id', $themeId)
                        ->where('status', true)
                        ->first();

                    if ($component && $componentTheme) {
                        // Verify the component belongs to the selected theme
                        $themeComponent = DB::table('theme_components')
                            ->where('theme_id', $themeId)
                            ->where('component_id', $componentId)
                            ->exists();

                        if ($themeComponent) {
                            $componentData[] = [
                                'company_id' => $company->id,
                                'component_id' => $componentId,
                                'theme_id' => $themeId,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }
                }

                if (!empty($componentData)) {
                    DB::table('company_selected_components')->insert($componentData);
                }
            }

            DB::commit();

            // Debug: Log what we saved
            \Log::info('Saved theme selections for company ' . $company->id, [
                'theme_id' => $validated['theme_id'],
                'components' => $validated['components'] ?? [],
                'component_count' => count($componentData ?? []),
            ]);

            return redirect()->route('company.theme.index')
                ->with('success', 'Theme and components updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Failed to save theme selections: ' . $e->getMessage());
            return back()->with('error', 'Failed to update theme selections. Please try again.');
        }
    }
}
