<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillCategoryRequest;
use App\Http\Requests\UpdateSkillCategoryRequest;
use App\Models\SkillCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SkillCategoryController extends Controller
{
    /**
     * Display a listing of skill categories with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');

            $query = SkillCategory::query();

            // Apply search filter
            if ($search) {
                $query->where('name', 'like', "%{$search}%");
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $categories = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Skill categories retrieved successfully',
                'data' => $categories,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching skill categories: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve skill categories',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active skill categories (for dropdown).
     */
    public function active(): JsonResponse
    {
        try {
            $categories = SkillCategory::active()
                ->orderBy('name', 'asc')
                ->get(['id', 'name']);

            return response()->json([
                'success' => true,
                'message' => 'Active skill categories retrieved successfully',
                'data' => $categories,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active skill categories: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active skill categories',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created skill category.
     */
    public function store(StoreSkillCategoryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $category = SkillCategory::create($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill category created successfully',
                'data' => $category,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating skill category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create skill category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified skill category.
     */
    public function show($id): JsonResponse
    {
        try {
            $category = SkillCategory::with(['skills' => function ($query) {
                $query->select('id', 'name', 'code', 'skill_category_id', 'status');
            }])->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Skill category retrieved successfully',
                'data' => $category,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Skill category not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching skill category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve skill category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified skill category.
     */
    public function update(UpdateSkillCategoryRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $category = SkillCategory::findOrFail($id);
            $category->update($request->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill category updated successfully',
                'data' => $category->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating skill category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update skill category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified skill category.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $category = SkillCategory::findOrFail($id);
            $category->toggleStatus();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill category status updated successfully',
                'data' => $category->fresh(),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling skill category status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update skill category status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified skill category (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $category = SkillCategory::findOrFail($id);

            // Check if category has associated skills
            if ($category->skills()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete skill category with associated skills',
                ], 422);
            }

            $category->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill category deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill category not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting skill category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete skill category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
