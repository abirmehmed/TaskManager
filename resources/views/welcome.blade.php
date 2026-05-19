<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TaskFlow') }} – Organize Your Day</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hero {
            background: radial-gradient(circle at 10% 20%, rgba(255,255,255,0.1) 0%, rgba(0,0,0,0.2) 100%);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen">
        <!-- Navigation (same as app layout) -->
        <nav class="bg-white/10 backdrop-blur-md shadow-lg border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-white font-bold text-xl tracking-tight">TaskFlow</a>
                    </div>
                    <div class="flex items-center space-x-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-white/80 hover:text-white">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-md text-sm">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-white/80 hover:text-white">Login</a>
                                <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 text-white px-3 py-1 rounded-md">Register</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="hero">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32 text-center">
                <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-lg">Stay Organized,<br>Stay Productive</h1>
                <p class="text-xl text-white/80 mt-4 max-w-2xl mx-auto">TaskFlow helps you manage your daily tasks with ease. Create, track, and complete tasks – all in one beautiful place.</p>
                <div class="mt-8 flex justify-center gap-4">
                    @auth
                        <a href="{{ route('tasks.index') }}" class="bg-white/30 hover:bg-white/40 text-white font-semibold px-6 py-3 rounded-full transition shadow-md">Go to My Tasks</a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white/30 hover:bg-white/40 text-white font-semibold px-6 py-3 rounded-full transition shadow-md">Get Started – Free</a>
                        <a href="{{ route('login') }}" class="bg-transparent border border-white/40 hover:bg-white/10 text-white font-semibold px-6 py-3 rounded-full transition">Login</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 text-center">
                    <div class="text-white text-4xl mb-3">✓</div>
                    <h3 class="text-xl font-semibold text-white">Simple Task Management</h3>
                    <p class="text-white/70 mt-2">Create, edit, and delete tasks with a clean interface.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 text-center">
                    <div class="text-white text-4xl mb-3">📅</div>
                    <h3 class="text-xl font-semibold text-white">Due Dates</h3>
                    <p class="text-white/70 mt-2">Set deadlines and never miss important tasks.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 text-center">
                    <div class="text-white text-4xl mb-3">🔒</div>
                    <h3 class="text-xl font-semibold text-white">Your Data, Safe</h3>
                    <p class="text-white/70 mt-2">Tasks are private to your account – only you can see them.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center py-6 text-white/50 text-sm border-t border-white/10">
            &copy; {{ date('Y') }} TaskFlow – Organize your day.
        </footer>
    </div>
</body>
</html>