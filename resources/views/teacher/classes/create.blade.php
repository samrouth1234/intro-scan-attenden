@extends('layouts.teacher')

@section('title', 'Create My Classes')

@section('content')
<div class="container">
  <h1>Create New Class</h1>

  <form method="POST" action="{{ route('classes.store') }}">
    @csrf
    <div class="mb-3">
      <label for="class_name" class="form-label">Class Name</label>
      <input type="text" class="form-control" id="class_name" name="class_name" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Class</button>
  </form>
</div>
@endsection