@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <!-- Header with animated gradient -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-white drop-shadow-lg">Your Tasks</h1>
        <p class="text-white/70 mt-2">Manage your daily goals with ease</p>
    </div>

    <!-- Create Task Button -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('tasks.create') }}" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white font-semibold py-2 px-5 rounded-full transition-all duration-200 shadow-md hover:shadow-xl flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            New Task
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500/20 backdrop-blur-sm border border-green-400 text-white px-4 py-3 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    @forelse($tasks as $task)
        <div class="group bg-white/10 backdrop-blur-md rounded-2xl shadow-lg mb-4 p-5 hover:bg-white/15 transition-all duration-300 border border-white/20">
            <div class="flex items-start justify-between">
                <div class="flex items-start space-x-4">
                    <!-- Toggle button with animation -->
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="focus:outline-none transform transition hover:scale-110">
                            @if($task->is_completed)
                                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-white/50 group-hover:text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </button>
                    </form>
                    <div>
                        <h3 class="text-xl font-semibold text-white {{ $task->is_completed ? 'line-through opacity-60' : '' }}">
                            {{ $task->title }}
                        </h3>
                        @if($task->description)
                            <p class="text-white/60 mt-1">{{ $task->description }}</p>
                        @endif
                        @if($task->due_date)
                            <p class="text-xs text-white/40 mt-2 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $task->due_date->format('M d, Y') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="text-white/50 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white/50 hover:text-red-300 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-12 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
            <svg class="mx-auto h-12 w-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            <p class="mt-4 text-white/60 text-lg">No tasks yet. Create your first task!</p>
        </div>
    @endforelse
</div>
@endsection