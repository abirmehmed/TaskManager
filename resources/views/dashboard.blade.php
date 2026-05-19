@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-8 border border-white/20 text-center">
        <h1 class="text-4xl font-bold text-white mb-4">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="text-white/70 text-lg">You have {{ Auth::user()->tasks()->count() }} task(s) in total.</p>
        <div class="mt-6 flex justify-center gap-4">
            <a href="{{ route('tasks.index') }}" class="bg-white/30 hover:bg-white/40 text-white font-semibold px-5 py-2 rounded-lg transition">View My Tasks</a>
            <a href="{{ route('tasks.create') }}" class="bg-white/20 hover:bg-white/30 text-white font-semibold px-5 py-2 rounded-lg transition">Create New Task</a>
        </div>
    </div>
</div>
@endsection