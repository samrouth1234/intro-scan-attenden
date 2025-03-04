@extends('layouts.student')

@section('title', 'Attendance History')
@section('content')
<div class="card shadow-sm p-4">
  <h1 class="h4 mb-4">Attendance History</h1>

  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th scope="col">Class</th>
          <th scope="col">Session Date</th>
          <th scope="col">Time Recorded</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attendances as $attendance)
        <tr>
          <td>{{ $attendance->session->class->class_name }}</td>
          <td>{{ $attendance->session->session_date->format('M d, Y') }}</td>
          <td>{{ $attendance->attendance_time->format('H:i:s') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $attendances->links() }}
  </div>
</div>
@endsection