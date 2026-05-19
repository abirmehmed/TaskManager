<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TaskFlow') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom global styles */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen">
        <!-- Custom Navigation Bar (not Breeze) -->
        <nav class="bg-white/10 backdrop-blur-md shadow-lg border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl tracking-tight">
                            TaskFlow
                        </a>
                        @auth
                            <div class="hidden md:flex ml-10 space-x-4">
                                <a href="{{ route('dashboard') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                                <a href="{{ route('tasks.index') }}" class="text-white/80 hover:text-white px-3 py-2 rounded-md text-sm font-medium">My Tasks</a>
                            </div>
                        @endauth
                    </div>
                    <div class="flex items-center space-x-3">
                        @auth
                            <span class="text-white/70 text-sm">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-md text-sm transition">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-white/80">Login</a>
                            <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-md">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Optional Footer -->
        <footer class="text-center py-6 text-white/50 text-sm">
            &copy; {{ date('Y') }} TaskFlow – Stay organized.
        </footer>
    </div>
</body>
</html>