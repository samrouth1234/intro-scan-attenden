@extends('layouts.teacher')

@section('content')
<div class="card mx-auto shadow-sm mt-5" style="max-width: 400px;">
  <div class="card-body">
    <h1 class="h4 text-center mb-4">Teacher Registration</h1>

    <form method="POST" action="{{ route('teacher.register') }}">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password-confirm" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Register</button>

      <div class="mt-3 text-center">
        <a href="{{ route('teacher.login') }}" class="text-primary">Already have an account? Login</a>
      </div>
    </form>
  </div>
</div>
@endsection