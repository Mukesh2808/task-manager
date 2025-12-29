@extends('layout')

@section('content')

<h2 class="mb-4">Create Task</h2>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title') }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Priority</label>
        <select name="priority" class="form-select">
            <option value="">Select Priority</option>
            @foreach(['Low','Medium','High'] as $priority)
                <option value="{{ $priority }}"
                    {{ old('priority') == $priority ? 'selected' : '' }}>
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
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
        @error('status')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">Create Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection
