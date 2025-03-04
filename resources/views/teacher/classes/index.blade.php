@extends('layouts.teacher')

@section('title', 'My Classes')
@section('content')
<div class="card p-4 shadow-sm">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4">My Classes</h1>
    <a href="{{ route('classes.create') }}" class="btn btn-primary">
      Create New Class
    </a>
  </div>

  <div class="row g-4">
    @foreach ($classes as $class)
    <div class="col-md-6 col-lg-4">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">{{ $class->class_name }}</h5>
          <div class="mt-3">
            <a href="{{ route('classes.show', $class) }}" class="text-primary me-2">View</a>
            <a href="{{ route('classes.edit', $class) }}" class="text-secondary me-2">Edit</a>
            <form method="POST" action="{{ route('classes.destroy', $class) }}" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link text-danger p-0 border-0">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection