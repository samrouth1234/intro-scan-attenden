<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'teacher_id',
        'class_name',
    ];

    // Relationship: A class belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relationship: A class can have many sessions
    public function sessions()
    {
        return $this->hasMany(ClassSession::class, 'class_id');
    }
}
