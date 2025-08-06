<x-layout>
    <form action="{{ route('companies.store') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Create a New company</h2>

        <label for="name">Company Name:</label>
        <input type="text" id="name" name="name" required value="{{ old('name') }}">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required value="{{ old('location') }}">

        <label for="description">Description:</label>
        <textarea rows="8" id="description" name="description" required>{{ old('description') }}</textarea>

        <button type="submit" class="btn mt-4">Add Company</button>

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
