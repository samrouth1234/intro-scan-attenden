@extends('layouts.teacher')

@section('title', $class->class_name)
@section('content')
<div class="card p-4 shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4">{{ $class->class_name }}</h1>
        <a href="{{ route('classes.edit', $class) }}" class="btn btn-secondary">
            Edit Class
        </a>
    </div>

    <div class="mb-4">
        <h2 class="h5 mb-3">Sessions</h2>
        <div class="list-group">
            @foreach($class->sessions as $session)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 fw-medium">{{ $session->session_date->format('M d, Y H:i') }}</p>
                    <p class="text-muted small mb-0">
                        Attendance: {{ $session->attendances->count() }} students
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('sessions.attendance', $session) }}" class="text-primary">View Attendance</a>
                    @if($session->is_active)
                    <form method="POST" action="{{ route('sessions.end', $session) }}" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-link text-danger p-0 border-0">End Session</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="border-top pt-4">
        <h3 class="h5 mb-3">Create New Session</h3>
        <form method="POST" action="{{ route('sessions.store', $class) }}">
            @csrf
            <div class="row g-2">
                <div class="col-md-8">
                    <input type="datetime-local" name="session_date" required class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Create Session</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection