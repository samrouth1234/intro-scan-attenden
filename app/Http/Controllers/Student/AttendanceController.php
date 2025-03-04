<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ClassSession;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showRecordForm($sessionToken)
{
    $session = ClassSession::where('session_token', $sessionToken)->firstOrFail();
    
    if (!$session->is_active) {
        return redirect()->back()->with('error', 'This session is no longer active');
    }

    return view('student.record-attendance', compact('session'));
}

public function recordAttendance(Request $request, ClassSession $session)
{
    if (!$session->is_active) {
        return redirect()->back()->with('error', 'Session has ended');
    }

    try {
        Attendance::create([
            'session_id' => $session->id,
            'student_id' => auth()->guard('student')->id(),
            'attendance_time' => now(),
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Attendance already recorded');
    }

    return redirect()->back()->with('success', 'Attendance recorded successfully');
}
}
