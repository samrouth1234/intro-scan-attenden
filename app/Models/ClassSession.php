<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{
    protected $fillable = [
        'class_id',
        'session_token',
        'session_date',
        'is_active',
    ];

    // Relationship: A session belongs to a TeachingClass
    public function teachingClass()
    {
        return $this->belongsTo(TeachingClass::class, 'teaching_class_id');
    }

    // Relationship: A session can have many attendances
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'session_id');
    }
}
