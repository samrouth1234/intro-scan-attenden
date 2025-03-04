<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeachingClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{

    /**
     * Display a listing of the classes.
     */
    public function index()
    {
        /** @var Teacher $teacher */
        $teacher = Auth::guard('teacher')->user();
        $classes = $teacher->classes()->latest()->get();

        return view('teacher.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new class.
     */
    public function create()
    {
        return view('teacher.classes.create');
    }

    /**
     * Store a newly created class in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        /** @var Teacher $teacher */
        $teacher = Auth::guard('teacher')->user();
        $class = $teacher->classes()->create([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('classes.show', $class)
            ->with('success', 'Class created successfully!');
    }

    /**
     * Display the specified class.
     */
    public function show(TeachingClass $class)
    {
        // Verify teacher owns the class
        if ($class->teacher_id !== Auth::guard('teacher')->id()) {
            abort(404);
        }
    
        $class->load('sessions.attendances.student'); 
    
        return view('teacher.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified class.
     */
    public function edit(TeachingClass $class)
    {
        if ($class->teacher_id !== Auth::guard('teacher')->id()) {
            abort(404);
        }

        return view('teacher.classes.edit', compact('class'));
    }

    /**
     * Update the specified class in storage.
     */
    public function update(Request $request, TeachingClass $class)
    {
        if ($class->teacher_id !== Auth::guard('teacher')->id()) {
            abort(404);
        }

        $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        $class->update([
            'class_name' => $request->class_name,
        ]);

        return redirect()->route('classes.show', $class)
            ->with('success', 'Class updated successfully!');
    }

    /**
     * Remove the specified class from storage.
     */
    public function destroy(TeachingClass $class)
    {
        if ($class->teacher_id !== Auth::guard('teacher')->id()) {
            abort(404);
        }

        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Class deleted successfully!');
    }
}
