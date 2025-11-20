<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    /**
     * Display a listing of countries with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = Country::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $countries = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Countries retrieved successfully',
                'data' => $countries,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching countries: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve countries',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active countries (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $countries = Country::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'code']);

            return response()->json([
                'success' => true,
                'message' => 'Active countries retrieved successfully',
                'data' => $countries,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active countries: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active countries',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created country.
     */
    public function store(StoreCountryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $country = Country::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Country created successfully',
                'data' => $country,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create country',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified country.
     */
    public function show($id): JsonResponse
    {
        try {
            $country = Country::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Country retrieved successfully',
                'data' => $country,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve country',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified country.
     */
    public function update(UpdateCountryRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $country = Country::findOrFail($id);
            $country->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Country updated successfully',
                'data' => $country->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update country',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified country.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $country = Country::findOrFail($id);
            $country->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Country status updated successfully',
                'data' => $country->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling country status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update country status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified country (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $country = Country::findOrFail($id);
            $country->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Country deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Country not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting country: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete country',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
