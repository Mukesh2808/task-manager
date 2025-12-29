@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Task List</h2>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        Add Task
    </a>
</div>

@if($tasks->count())
<table class="table table-bordered table-striped bg-white">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->priority }}</td>
            <td>
                <span class="badge {{ $task->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                    {{ $task->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy', $task) }}"
                      method="POST"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this task?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-info">No tasks found.</div>
@endif

@endsection
