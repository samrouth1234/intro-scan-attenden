@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Welcome to QR Attendance System</div>

      <div class="card-body">
        <div class="row text-center">
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text">Register or login to your student account to mark your attendance.</p>
                <a href="{{ route('student.login') }}" class="btn btn-primary btn-lg mx-2">Login</a>
                <a href="{{ route('student.register') }}" class="btn btn-success btn-lg mx-2">Register</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Teachers</h5>
                <p class="card-text">Login to manage your classes and create attendance sessions.</p>
                <a href="{{ route('teacher.login') }}" class="btn btn-primary btn-lg mx-2">Login</a>
                <a href="{{ route('teacher.register') }}" class="btn btn-success btn-lg mx-2">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

