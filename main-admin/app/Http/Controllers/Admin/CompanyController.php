<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('industry', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Pagination
        $companies = $query->latest()->paginate(10);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'about_us' => 'nullable|string',
            'open_positions_note' => 'nullable|string',
            'employee_benefits' => 'nullable|string',
            'work_culture' => 'nullable|string',
            'notable_clients_projects' => 'nullable|string',
            'employee_reviews' => 'nullable|string',
            'diversity_inclusion' => 'nullable|string',
            'company_video' => 'nullable|url|max:255',
            'application_process' => 'nullable|string',
            'legal_information' => 'nullable|string',
        ]);

        // Handle checkbox - checkboxes don't send value when unchecked
        $validated['is_active'] = $request->has('is_active');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        // Handle JSON fields
        $validated['social_media_links'] = $request->input('social_media_links', []);
        $validated['job_categories'] = $request->input('job_categories', []);
        $validated['contact_info'] = $request->input('contact_info', []);

        Company::create($validated);

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'about_us' => 'nullable|string',
            'open_positions_note' => 'nullable|string',
            'employee_benefits' => 'nullable|string',
            'work_culture' => 'nullable|string',
            'notable_clients_projects' => 'nullable|string',
            'employee_reviews' => 'nullable|string',
            'diversity_inclusion' => 'nullable|string',
            'company_video' => 'nullable|url|max:255',
            'application_process' => 'nullable|string',
            'legal_information' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Handle checkbox - checkboxes don't send value when unchecked
        $validated['is_active'] = $request->has('is_active');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        // Handle JSON fields
        $validated['social_media_links'] = $request->input('social_media_links', []);
        $validated['job_categories'] = $request->input('job_categories', []);
        $validated['contact_info'] = $request->input('contact_info', []);

        // Remove password from company data
        unset($validated['password']);

        $company->update($validated);

        // Update associated user's password if provided
        if ($request->filled('password')) {
            $company->user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // Delete logo if exists
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
    }

    /**
     * Bulk delete companies
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:companies,id',
        ]);

        $companies = Company::whereIn('id', $request->ids)->get();

        foreach ($companies as $company) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $company->delete();
        }

        return redirect()->route('admin.companies.index')->with('success', 'Companies deleted successfully.');
    }
}
