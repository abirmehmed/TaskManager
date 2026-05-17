@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <h1 class="text-2xl font-bold mb-6">Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required
                class="w-full border-gray-300 rounded-md shadow-sm">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="3"
                class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $task->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label for="due_date" class="block text-gray-700 font-medium mb-2">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                class="w-full border-gray-300 rounded-md shadow-sm">
            @error('due_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Task</button>
        </div>
    </form>
</div>
@endsection