<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function store(Request $request, TeachingClass $class)
    {
        $request->validate([
            'session_date' => 'required|date',
        ]);

        $session = $class->sessions()->create([
            'session_token' => Str::random(40),
            'session_date' => $request->session_date,
            'is_active' => true,
        ]);

        $qrUrl = route('attendance.record', $session->session_token);

        return view('teacher.qr-display', compact('qrUrl', 'session'));
    }
}
