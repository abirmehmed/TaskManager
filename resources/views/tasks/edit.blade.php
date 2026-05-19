@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-xl p-8 border border-white/20">
        <h1 class="text-3xl font-bold text-white mb-2">Edit Task</h1>
        <p class="text-white/60 mb-6">Update your task details.</p>

        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block text-white/80 font-medium mb-2">Title <span class="text-red-300">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required
                    class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition">
                @error('title')<p class="text-red-300 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block text-white/80 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-white/50">{{ old('description', $task->description) }}</textarea>
                @error('description')<p class="text-red-300 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="due_date" class="block text-white/80 font-medium mb-2">Due Date</label>
                <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                    class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                @error('due_date')<p class="text-red-300 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('tasks.index') }}" class="bg-white/10 hover:bg-white/20 text-white px-5 py-2 rounded-lg transition">Cancel</a>
                <button type="submit" class="bg-white/30 hover:bg-white/40 text-white font-semibold px-5 py-2 rounded-lg transition shadow-md">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection