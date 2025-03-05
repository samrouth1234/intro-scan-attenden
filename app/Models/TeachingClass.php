<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\ClassSession;

class TeachingClass extends Model
{
    protected $table = 'classes';  // Keep the table name as 'classes'

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function sessions() {
        return $this->hasMany(ClassSession::class, 'teaching_class_id');
    }
}