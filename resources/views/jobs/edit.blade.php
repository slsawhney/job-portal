<x-layout>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Edit Job</h2>

        <label for="name">Job title * :</label>
        <input type="text" id="title" name="title" required value="{{ old('title', $job->title) }}">

        <label for="location">Location * :</label>
        <input type="text" id="location" name="location" required value="{{ old('location', $job->location) }}">

        <label for="company_id">Company:</label>
        <select id="company_id" name="company_id" required>
            <option value="" disabled selected>Select a company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ $company->id == old('company_id', $job->company_id) ? 'selected' : '' }} >
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <label for="employment_type">Employment type * :</label>
        <select id="employment_type" name="employment_type" required>
            <option value="" disabled >Select a type</option>
            <option value="full-time" {{ old('employment_type', $job->employment_type) == 'full-time' ? 'selected' : '' }}>Full Time</option>
            <option value="part-time" {{ old('employment_type', $job->employment_type) == 'part-time' ? 'selected' : '' }}>Part Time</option>
            <option value="contract" {{ old('employment_type', $job->employment_type) == 'contract' ? 'selected' : '' }}>Contract</option>
            <option value="internship" {{ old('employment_type', $job->employment_type) == 'internship' ? 'selected' : '' }}>Internship</option>
            <option value="freelance" {{ old('employment_type', $job->employment_type) == 'freelance' ? 'selected' : '' }}>Freelance</option>
        </select>

        <label for="description">Description * :</label>
        <textarea rows="8" id="description" name="description" required>{{ old('description', $job->description) }}</textarea>

        <div class="flex gap-4">
            <button type="submit" class="btn mt-4">Save Job</button>
            <a href="{{ route('companies.show', $job->company_id ) }}" class="btn ml-4">Cancel</a>
        </div>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>
