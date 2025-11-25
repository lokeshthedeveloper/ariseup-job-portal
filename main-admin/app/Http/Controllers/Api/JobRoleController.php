<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRoleRequest;
use App\Http\Requests\UpdateJobRoleRequest;
use App\Models\JobRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JobRoleController extends Controller
{
    /**
     * Display a listing of job roles with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $categoryId = $request->input('category_id');

            $query = JobRole::query();

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

            // Apply category filter
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $jobRoles = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Job roles retrieved successfully',
                'data' => $jobRoles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching job roles: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job roles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active job roles (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $jobRoles = JobRole::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'category_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active job roles retrieved successfully',
                'data' => $jobRoles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active job roles: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active job roles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get job roles by category.
     */
    public function getByCategory($categoryId): JsonResponse
    {
        try {
            $jobRoles = JobRole::active()
                ->where('category_id', $categoryId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'category_id', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Job roles retrieved successfully',
                'data' => $jobRoles,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching job roles by category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job roles',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created job role.
     */
    public function store(StoreJobRoleRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobRole = JobRole::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job role created successfully',
                'data' => $jobRole,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating job role: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create job role',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified job role.
     */
    public function show($id): JsonResponse
    {
        try {
            $jobRole = JobRole::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Job role retrieved successfully',
                'data' => $jobRole,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Job role not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching job role: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve job role',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified job role.
     */
    public function update(UpdateJobRoleRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobRole = JobRole::findOrFail($id);
            $jobRole->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job role updated successfully',
                'data' => $jobRole->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job role not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating job role: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update job role',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified job role.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobRole = JobRole::findOrFail($id);
            $jobRole->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job role status updated successfully',
                'data' => $jobRole->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job role not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling job role status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update job role status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified job role (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $jobRole = JobRole::findOrFail($id);
            $jobRole->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job role deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Job role not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting job role: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete job role',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
