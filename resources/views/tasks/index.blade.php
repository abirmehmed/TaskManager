@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ New Task</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($tasks as $task)
        <div class="bg-white rounded-lg shadow mb-3 p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-2xl">
                        {{ $task->is_completed ? '✅' : '⬜' }}
                    </button>
                </form>
                <div>
                    <p class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                        {{ $task->title }}
                    </p>
                    @if($task->description)
                        <p class="text-sm text-gray-500">{{ Str::limit($task->description, 50) }}</p>
                    @endif
                    @if($task->due_date)
                        <p class="text-xs text-gray-400">Due: {{ $task->due_date->format('Y-m-d') }}</p>
                    @endif
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('tasks.edit', $task) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No tasks yet. Create your first task!</p>
    @endforelse
</div>
@endsection