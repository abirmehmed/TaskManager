<x-guest-layout>
    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-8 border border-white/20">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">Welcome Back</h1>
            <p class="text-white/60 mt-1">Log in to your TaskFlow account</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-white/80 font-medium mb-2">Email</label>
                <input id="email" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-white/80 font-medium mb-2">Password</label>
                <input id="password" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="password" name="password" required autocomplete="current-password">
                @error('password') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-white/70">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-white/70 hover:text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-white/30 hover:bg-white/40 text-white font-semibold py-2 rounded-lg transition shadow-md">
                Log in
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="text-white/70 hover:text-white text-sm">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</x-guest-layout>