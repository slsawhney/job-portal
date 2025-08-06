<x-layout>
    <form action="{{ route('register') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Register</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="{{ old('name') }}">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit" class="btn mt-4">Register</button>

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
