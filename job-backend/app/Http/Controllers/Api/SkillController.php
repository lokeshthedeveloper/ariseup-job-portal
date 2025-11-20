<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SkillController extends Controller
{
    /**
     * Display a listing of skills with pagination, search, and filters.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->input('per_page', 15);
            $search = $request->input('search');
            $status = $request->input('status');
            $categoryId = $request->input('category_id');

            $query = Skill::with('category:id,name,status');

            // Apply search filter
            if ($search) {
                $query->search($search);
            }

            // Apply status filter
            if ($status !== null && $status !== '') {
                $query->where('status', $status);
            }

            // Apply category filter
            if ($categoryId) {
                $query->byCategory($categoryId);
            }

            // Order by latest first
            $query->orderBy('created_at', 'desc');

            $skills = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Skills retrieved successfully',
                'data' => $skills,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching skills: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve skills',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all active skills (for dropdown).
     */
    public function active(Request $request): JsonResponse
    {
        try {
            $categoryId = $request->input('category_id');

            $query = Skill::active()
                ->with('category:id,name');

            if ($categoryId) {
                $query->byCategory($categoryId);
            }

            $skills = $query->orderBy('name', 'asc')
                ->get(['id', 'name', 'code', 'skill_category_id']);

            return response()->json([
                'success' => true,
                'message' => 'Active skills retrieved successfully',
                'data' => $skills,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching active skills: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active skills',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created skill.
     */
    public function store(StoreSkillRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $skill = Skill::create($request->validated());
            $skill->load('category:id,name,status');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill created successfully',
                'data' => $skill,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating skill: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create skill',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified skill.
     */
    public function show($id): JsonResponse
    {
        try {
            $skill = Skill::with('category:id,name,status')->findOrFail($id);

            return response()->json([
                'success' => true,
                'message' => 'Skill retrieved successfully',
                'data' => $skill,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Skill not found',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching skill: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve skill',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified skill.
     */
    public function update(UpdateSkillRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $skill = Skill::findOrFail($id);
            $skill->update($request->validated());
            $skill->load('category:id,name,status');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill updated successfully',
                'data' => $skill->fresh(['category']),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating skill: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update skill',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Toggle the status of the specified skill.
     */
    public function toggleStatus($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $skill = Skill::findOrFail($id);
            $skill->toggleStatus();
            $skill->load('category:id,name,status');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill status updated successfully',
                'data' => $skill->fresh(['category']),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error toggling skill status: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update skill status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified skill (soft delete).
     */
    public function destroy($id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $skill = Skill::findOrFail($id);
            $skill->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Skill deleted successfully',
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Skill not found',
            ], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting skill: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete skill',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get skills by category.
     */
    public function getByCategory($categoryId): JsonResponse
    {
        try {
            $skills = Skill::byCategory($categoryId)
                ->with('category:id,name,status')
                ->orderBy('name', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Skills retrieved successfully',
                'data' => $skills,
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching skills by category: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve skills',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
