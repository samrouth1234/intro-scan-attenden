<?php

namespace App\Policies;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacher can view the class.
     */
    public function view(Teacher $teacher, Classes $class)
    {
        return $teacher->id === $class->teacher_id;
    }

    /**
     * Determine whether the teacher can update the class.
     */
    public function update(Teacher $teacher, Classes $class)
    {
        return $teacher->id === $class->teacher_id;
    }

    /**
     * Determine whether the teacher can delete the class.
     */
    public function delete(Teacher $teacher, Classes $class)
    {
        return $teacher->id === $class->teacher_id;
    }
}