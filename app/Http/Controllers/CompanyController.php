<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::where('owner_id', auth()->id())->orderBy(
            'created_at',
            'desc'
        )->paginate(10);

        return view('companies.index', ['companies' => $companies]);
    }

    public function show(Company &$company)
    {

        // Paginate the jobs related to this company.
        $jobs = $company->job()->orderBy('created_at', 'desc')->paginate(10);

        return view('companies.show', compact('company', 'jobs'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function edit(Company &$company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
        ]);

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|min:20|max:1000',
        ]);

        $validated['owner_id'] = Auth::id();

        Company::create($validated);

        return redirect()->route('companies.index')->with(
            'success',
            'Company created!'
        );
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with(
            'success',
            'Company deleted!'
        );
    }
}
