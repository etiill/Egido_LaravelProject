<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Livewire\Attributes\Validate;

class StudentController extends Controller
{
   public function index()
{
    $students = Student::with('course')->latest()->get();
    $courses = \App\Models\Course::all();
    $activeCourses = \App\Models\Course::where('status', 'active')->count();

    return view('dashboard', compact('students', 'courses', 'activeCourses'));
}


    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
    ]);

    Student::create($validated);

    return redirect()->back()->with('success', 'Student added successfully.');
}

}



