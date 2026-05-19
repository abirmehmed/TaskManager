<x-guest-layout>
    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-8 border border-white/20">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">Create Account</h1>
            <p class="text-white/60 mt-1">Join TaskFlow and start organizing your tasks</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-white/80 font-medium mb-2">Name</label>
                <input id="name" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-white/80 font-medium mb-2">Email</label>
                <input id="email" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-white/80 font-medium mb-2">Password</label>
                <input id="password" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="password" name="password" required autocomplete="new-password">
                @error('password') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-white/80 font-medium mb-2">Confirm Password</label>
                <input id="password_confirmation" class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation') <p class="text-red-300 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-white/30 hover:bg-white/40 text-white font-semibold py-2 rounded-lg transition shadow-md">
                Register
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-white/70 hover:text-white text-sm">Already registered? Log in</a>
            </div>
        </form>
    </div>
</x-guest-layout>