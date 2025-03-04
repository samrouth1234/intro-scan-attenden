@extends('layouts.student')

@section('title', 'Record Attendance')
@section('content')
<div class="card mx-auto shadow-sm mt-5" style="max-width: 400px;">
  <div class="card-body text-center">
    <h1 class="h4 mb-2">{{ $session->class->class_name }}</h1>
    <p class="text-muted">{{ $session->session_date->format('F j, Y \a\t H:i') }}</p>
  </div>

  @if(session('success'))
  <div class="alert alert-success text-center" role="alert">
    {{ session('success') }}
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger text-center" role="alert">
    @foreach($errors->all() as $error)
    <p class="mb-0">{{ $error }}</p>
    @endforeach
  </div>
  @endif

  <div class="card-body text-center">
    <form method="POST" action="{{ route('attendance.submit', $session) }}">
      @csrf
      <button type="submit" class="btn btn-success w-100">Confirm My Attendance</button>
    </form>
  </div>
</div>
@endsection