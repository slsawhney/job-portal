<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function create()
    {
        $companies = Company::where('owner_id', auth()->id())->orderBy(
            'name',
            'asc'
        )->get();

        return view('jobs.create', ["companies" => $companies]);
    }

    public function edit(Job $job)
    {
        $companies = Company::where('owner_id', auth()->id())->orderBy(
            'name',
            'asc'
        )->get();

        return view('jobs.edit', ['job' => $job, 'companies' => $companies]);
    }

    public function update(Request $request, Job $job)
    {
        // check if the authenticated user owns the job's company.
        if ($job->company->owner_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string|min:20|max:1000',
        ]);

        $job->update($validated);

        return redirect()->route('companies.show', $request->input('company_id'))->with(
            'success',
            'Job updated successfully!'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string|min:20|max:1000',
        ]);

        $validated['status'] = 1;

        Job::create($validated);

        return redirect()->route('companies.show', $request->input('company_id'))->with(
            'success',
            'Job created!'
        );
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with(
            'success',
            'Company deleted!'
        );
    }
}
