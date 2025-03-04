<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'session_id',
        'student_id',
        'attendance_time',
    ];

    // Relationship: An attendance record belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship: An attendance record belongs to a session
    public function session()
    {
        return $this->belongsTo(ClassSession::class, 'session_id');
    }
}
