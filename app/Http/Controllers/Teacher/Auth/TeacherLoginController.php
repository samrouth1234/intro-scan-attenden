<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
  /**
   * Show the teacher login form
   */
  public function showLoginForm()
  {
    return view('teacher.auth.login');
  }

  /**
   * Handle teacher login request
   */
  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required|string',
    ]);

    if (Auth::guard('teacher')->attempt($credentials, $request->remember)) {
      $request->session()->regenerate();
      return redirect()->intended(route('classes.index'));
    }

    return back()->withErrors([
      'email' => 'Invalid credentials',
    ])->onlyInput('email');
  }

  /**
   * Handle teacher logout
   */
  public function logout(Request $request)
  {
    Auth::guard('teacher')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('teacher.login');
  }

  /**
   * Get the guard to be used during authentication
   */
  protected function guard()
  {
    return Auth::guard('teacher');
  }
}
