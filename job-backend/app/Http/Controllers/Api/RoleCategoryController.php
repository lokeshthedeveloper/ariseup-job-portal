<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleCategoryRequest;
use App\Http\Requests\UpdateRoleCategoryRequest;
use App\Models\RoleCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleCategoryController extends Controller
{
    /**
     * Display a listing of role categories with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = RoleCategory::query();

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

            $roleCategories = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Role categories retrieved successfully',
                'data' => $roleCategories,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching role categories: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve role categories',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active role categories (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $roleCategories = RoleCategory::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active role categories retrieved successfully',
                'data' => $roleCategories,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active role categories: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active role categories',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created role category.
     */
    public function store(StoreRoleCategoryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $roleCategory = RoleCategory::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Role category created successfully',
                'data' => $roleCategory,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating role category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create role category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified role category.
     */
    public function show($id): JsonResponse
    {
        try {
            $roleCategory = RoleCategory::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Role category retrieved successfully',
                'data' => $roleCategory,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Role category not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching role category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve role category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified role category.
     */
    public function update(UpdateRoleCategoryRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $roleCategory = RoleCategory::findOrFail($id);
            $roleCategory->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Role category updated successfully',
                'data' => $roleCategory->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Role category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating role category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update role category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified role category.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $roleCategory = RoleCategory::findOrFail($id);
            $roleCategory->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Role category status updated successfully',
                'data' => $roleCategory->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Role category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling role category status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update role category status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified role category (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $roleCategory = RoleCategory::findOrFail($id);
            $roleCategory->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Role category deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Role category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting role category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete role category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
