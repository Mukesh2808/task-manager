@extends('layout')

@section('content')

<h2 class="mb-4">Edit Task</h2>

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $task->title) }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Priority</label>
        <select name="priority" class="form-select">
            @foreach(['Low','Medium','High'] as $priority)
                <option value="{{ $priority }}"
                    {{ $task->priority == $priority ? 'selected' : '' }}>
                    {{ $priority }}
                </option>
            @endforeach
        </select>
        @error('priority')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>
            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>
        @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection
