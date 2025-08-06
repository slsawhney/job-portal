<x-layout>
    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Edit company</h2>

        <label for="name">Company Name * :</label>
        <input type="text" id="name" name="name" required value="{{ old('name', $company->name) }}">

        <label for="location">Location * :</label>
        <input type="text" id="location" name="location" required value="{{ old('location', $company->location) }}">

        <label for="description">Description * :</label>
        <textarea rows="8" id="description" name="description" required>{{ old('description', $company->description) }}</textarea>

        <div class="flex gap-4">
            <button type="submit" class="btn mt-4">Save Company</button>
            <a href="{{ route('companies.show', $company->id ) }}" class="btn ml-4">Cancel</a>
        </div>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error  }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>
