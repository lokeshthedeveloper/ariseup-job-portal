<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Models\Industry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndustryController extends Controller
{
    /**
     * Display a listing of industries with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = Industry::query();

            // Apply search filter
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $industries = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Industries retrieved successfully',
                'data' => $industries,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching industries: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve industries',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active industries (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $industries = Industry::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active industries retrieved successfully',
                'data' => $industries,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active industries: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active industries',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created industry.
     */
    public function store(StoreIndustryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $industry = Industry::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Industry created successfully',
                'data' => $industry,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating industry: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create industry',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified industry.
     */
    public function show($id): JsonResponse
    {
        try {
            $industry = Industry::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Industry retrieved successfully',
                'data' => $industry,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Industry not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching industry: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve industry',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified industry.
     */
    public function update(UpdateIndustryRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $industry = Industry::findOrFail($id);
            $industry->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Industry updated successfully',
                'data' => $industry->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Industry not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating industry: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update industry',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified industry.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $industry = Industry::findOrFail($id);
            $industry->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Industry status updated successfully',
                'data' => $industry->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Industry not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling industry status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update industry status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified industry (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $industry = Industry::findOrFail($id);
            $industry->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Industry deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Industry not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting industry: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete industry',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
