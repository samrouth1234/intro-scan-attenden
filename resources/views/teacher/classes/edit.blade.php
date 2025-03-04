@extends('layouts.teacher')

@section('title', 'Edit Class')
@section('content')
<div class="container">
  <h1>Edit Class</h1>

  <form method="POST" action="{{ route('classes.update', $class->id) }}">
    @csrf
    @method('PUT') <!-- Specify that this is an update request -->

    <div class="mb-3">
      <label for="class_name" class="form-label">Class Name</label>
      <input type="text" class="form-control" id="class_name" name="class_name" value="{{ old('class_name', $class->class_name) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Class</button>
  </form>

  <a href="{{ route('classes.show', $class->id) }}" class="btn btn-secondary mt-3">Back to Class</a>
</div>
@endsection