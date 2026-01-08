<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ThemeConfigController extends Controller
{
    /**
     * Get theme configuration for a company based on hostname/subdomain
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConfig(Request $request)
    {
        $request->validate([
            'hostname' => 'required|string',
        ]);

        $hostname = $request->input('hostname');

        // Remove protocol and trailing slash if present
        $hostname = rtrim($hostname, '/');
        $hostname = parse_url($hostname, PHP_URL_HOST) ?: $hostname;

        // Try to get from Redis cache first
        $cacheKey = "theme_config:{$hostname}";

        $config = Cache::remember($cacheKey, now()->addHours(24), function () use ($hostname) {
            return $this->fetchThemeConfig($hostname);
        });

        if (!$config) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found or inactive',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Theme configuration retrieved successfully',
            'data' => $config
        ]);
    }

    /**
     * Fetch theme configuration from database
     * 
     * @param string $hostname
     * @return array|null
     */
    private function fetchThemeConfig(string $hostname)
    {
        try {
            // Extract potential subdomain (e.g., 'xyz' from 'xyz.abc.local')
            $cleanHost = str_replace('www.', '', $hostname);
            $parts = explode('.', $cleanHost);
            $subdomainPart = (count($parts) > 2) ? $parts[0] : null;

            // Find company by website or subdomain
            $company = Company::where('is_active', true)
                ->where(function ($query) use ($hostname, $cleanHost, $subdomainPart) {
                    // Variations of the original hostname
                    $query->where('website', $hostname)
                        ->orWhere('website', 'http://' . $hostname)
                        ->orWhere('website', 'https://' . $hostname)
                        ->orWhere('website', 'http://' . $hostname . '/')
                        ->orWhere('website', 'https://' . $hostname . '/')
                        ->orWhere('website', 'www.' . $hostname)
                        ->orWhere('website', 'http://www.' . $hostname)
                        ->orWhere('website', 'https://www.' . $hostname);

                    // Variations of the clean hostname (without www)
                    if ($cleanHost !== $hostname) {
                        $query->orWhere('website', $cleanHost)
                            ->orWhere('website', 'http://' . $cleanHost)
                            ->orWhere('website', 'https://' . $cleanHost)
                            ->orWhere('website', 'http://' . $cleanHost . '/')
                            ->orWhere('website', 'https://' . $cleanHost . '/');
                    }

                    // Subdomain checks
                    $query->orWhere('subdomain', $hostname)
                        ->orWhere('subdomain', $cleanHost);

                    if ($subdomainPart) {
                        $query->orWhere('subdomain', $subdomainPart);
                    }
                })
                ->with(['selectedComponents.themes'])
                ->first();

            if (!$company) {
                Log::warning("Company not found for hostname: {$hostname}");
                return null;
            }

            // Get selected components with their theme information
            $components = [];
            $selectedComponentsData = \DB::table('company_selected_components')
                ->where('company_id', $company->id)
                ->join('components', 'company_selected_components.component_id', '=', 'components.id')
                ->join('themes', 'company_selected_components.theme_id', '=', 'themes.id')
                ->where('components.status', true)
                ->where('themes.status', true)
                ->select(
                    'components.id as component_id',
                    'components.name as component_name',
                    'components.slug as component_slug',
                    'themes.id as theme_id',
                    'themes.name as theme_name',
                    'themes.slug as theme_slug'
                )
                ->get();

            foreach ($selectedComponentsData as $component) {
                $components[$component->component_slug] = [
                    'id' => $component->component_id,
                    'name' => $component->component_name,
                    'slug' => $component->component_slug,
                    'theme' => [
                        'id' => $component->theme_id,
                        'name' => $component->theme_name,
                        'slug' => $component->theme_slug,
                    ],
                ];
            }

            // Get the main selected theme
            $selectedThemeData = \DB::table('company_selected_themes')
                ->where('company_id', $company->id)
                ->join('themes', 'company_selected_themes.theme_id', '=', 'themes.id')
                ->where('themes.status', true)
                ->select('themes.id', 'themes.name', 'themes.slug')
                ->first();

            return [
                'company' => [
                    'id' => $company->id,
                    'name' => $company->name,
                    'logo' => $company->logo,
                    'website' => $company->website,
                    'subdomain' => $company->subdomain,
                ],
                'theme' => $selectedThemeData ? [
                    'id' => $selectedThemeData->id,
                    'name' => $selectedThemeData->name,
                    'slug' => $selectedThemeData->slug,
                ] : null,
                'components' => $components,
                'cached_at' => now()->toIso8601String(),
            ];
        } catch (\Exception $e) {
            Log::error("Error fetching theme config for {$hostname}: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Clear cache for a specific hostname
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearCache(Request $request)
    {
        $request->validate([
            'hostname' => 'required|string',
        ]);

        $hostname = $request->input('hostname');
        $hostname = rtrim($hostname, '/');
        $hostname = parse_url($hostname, PHP_URL_HOST) ?: $hostname;
        $cacheKey = "theme_config:{$hostname}";

        Cache::forget($cacheKey);

        return response()->json([
            'success' => true,
            'message' => 'Cache cleared successfully',
        ]);
    }
}
