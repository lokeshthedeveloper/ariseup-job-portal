<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = Department::query();

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

            $departments = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Departments retrieved successfully',
                'data' => $departments,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching departments: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve departments',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active departments (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $departments = Department::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'description']);

            return response()->json([
                'success' => true,
                'message' => 'Active departments retrieved successfully',
                'data' => $departments,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active departments: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active departments',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created department.
     */
    public function store(StoreDepartmentRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $department = Department::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department created successfully',
                'data' => $department,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating department: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create department',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified department.
     */
    public function show($id): JsonResponse
    {
        try {
            $department = Department::findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Department retrieved successfully',
                'data' => $department,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Department not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching department: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve department',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified department.
     */
    public function update(UpdateDepartmentRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $department = Department::findOrFail($id);
            $department->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department updated successfully',
                'data' => $department->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Department not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating department: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update department',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified department.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $department = Department::findOrFail($id);
            $department->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department status updated successfully',
                'data' => $department->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Department not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling department status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update department status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified department (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $department = Department::findOrFail($id);
            $department->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Department deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Department not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting department: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete department',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
