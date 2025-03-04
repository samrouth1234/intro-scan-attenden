<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
  public function showRegistrationForm()
  {
    return view('teacher.auth.register');
  }

  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:teachers',
      'password' => 'required|string|min:8|confirmed',
    ]);

    $teacher = Teacher::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    Auth::guard('teacher')->login($teacher);

    return redirect()->route('classes.index');
  }
}
