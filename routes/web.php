<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\Teacher\SessionController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\Auth\StudentLoginController;
use App\Http\Controllers\Student\Auth\StudentRegisterController;
use App\Http\Controllers\Teacher\Auth\TeacherLoginController;
use App\Http\Controllers\Teacher\Auth\TeacherRegisterController;

// Public Routes
Route::get('/', function () {
  return view('welcome');
});

// Teacher Authentication Routes
Route::prefix('teacher')->group(function () {
  Route::get('/login', [TeacherLoginController::class, 'showLoginForm'])
    ->name('teacher.login');
  Route::post('/login', [TeacherLoginController::class, 'login']);
  Route::post('/logout', [TeacherLoginController::class, 'logout'])
    ->name('teacher.logout');
  Route::get('/register', [TeacherRegisterController::class, 'showRegistrationForm'])
    ->name('teacher.register');
  Route::post('/register', [TeacherRegisterController::class, 'register']);
});

// Protected Teacher Routes
Route::middleware(['auth:teacher'])->prefix('teacher')->group(function () {
  // Class Management
  Route::resource('classes', ClassController::class);

  // Session Management
  Route::post('classes/{class}/class_sessions', [SessionController::class, 'store'])
    ->name('class_sessions.store');
  Route::patch('class_sessions/{session}/end', [SessionController::class, 'endSession'])
    ->name('class_sessions.end');

  // Attendance Reports
  Route::get('class_sessions/{session}/attendance', [SessionController::class, 'showAttendance'])
    ->name('class_sessions.attendance');
});

// Student Authentication Routes
Route::prefix('student')->group(function () {
  Route::get('/login', [StudentLoginController::class, 'showLoginForm'])
    ->name('student.login');
  Route::post('/login', [StudentLoginController::class, 'login']);
  Route::post('/logout', [StudentLoginController::class, 'logout'])
    ->name('student.logout');
  Route::get('/register', [StudentRegisterController::class, 'showRegistrationForm'])
    ->name('student.register');
  Route::post('/register', [StudentRegisterController::class, 'register']);
});

// Protected Student Routes
Route::middleware(['auth:student'])->prefix('student')->group(function () {
  // Attendance Handling
  Route::get('/attendance/{sessionToken}/record', [AttendanceController::class, 'showRecordForm'])
    ->name('attendance.record')
    ->where('sessionToken', '[A-Za-z0-9]{40}'); // Validate session token format

  Route::post('/attendance/{session}/record', [AttendanceController::class, 'recordAttendance'])
    ->name('attendance.submit');

  // Attendance History
  Route::get('/attendance/history', [AttendanceController::class, 'history'])
    ->name('attendance.history');
});

// Public QR Scanning Route (no auth required)
Route::get('/scan/{sessionToken}', [AttendanceController::class, 'showScanPage'])
  ->name('scan.page')
  ->where('sessionToken', '[A-Za-z0-9]{40}');

// Redirect authenticated users
Route::redirect('/home', '/teacher/classes')->middleware('auth:teacher');
Route::redirect('/student/home', '/student/attendance/history')->middleware('auth:student');
