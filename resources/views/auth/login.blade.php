<x-layout>
  <form action="{{ route('login') }}" method="POST">
    <!-- CSRF token for security -->
    @csrf

    <h2>Login</h2>

    <label for="name">Email:</label>
    <input type="email" id="email" name="email" required value="{{ old('email') }}">
    <label for="name">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="btn mt-4">Login</button>

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
