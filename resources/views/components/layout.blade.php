<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Job Portal</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <header>
            <nav>
                <div class="flex items-center justify-between max-w-screen-xl px-12 mx-auto">
                    <h1 class="text-xl font-bold">Job Portal</h1>
                    <div class="flex items-center justify-between">
                        <ul class="flex gap-6">
                            <!-- Main menu item with dropdown -->
                            @auth
                                <li class="relative group">
                                    <a href="#">Jobs</a>
                                    <ul>
                                        <li><a href="{{ route('jobs.index') }}">View Jobs</a></li>
                                        <li><a href="{{ route('jobs.create') }}">Add Job</a></li>
                                    </ul>
                                </li>
                                <li class="relative group">
                                    <a href="#">Companies</a>
                                    <ul>
                                        <li><a href="{{ route('companies.create') }}">Create Company</a></li>
                                        <li><a href="{{ route('companies.index') }}">My Companies</a></li>
                                    </ul>
                                </li>
                            @endauth
                            @guest
                                <li>
                                    <a href="{{ route('jobs.index') }}">Jobs</a>
                                </li>
                            @endguest
                        </ul>

                        @guest
                            <a href="{{ route('login') }}" class="btn ml-4">Login</a>
                            <a href="{{ route('register') }}" class="btn ml-4">Register</a>
                        @endguest

                        @auth
                            <span class="pr-2 text-green-500 font-bold">Hi, {{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="max-w-max">
                                @csrf
                                <button class="btn ml-4">Logout</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>
        <main class="container">
            @if (session('success'))
                <div class="p-4 text-center bg-green-50 text-green-500 font-bold">
                    {{ session('success') }}
                </div>
            @endif
            {{ $slot }}
        </main>
    </body>
</html>
