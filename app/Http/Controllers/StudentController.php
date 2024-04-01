<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return Inertia::render(
            'Students/Index',
            [
                'students' => $students
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Students/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images');
        }

        Student::create([
            'name' => $request->name,
            'image' => $imagePath,
            'age' => $request->age,
            'status' => $request->status
        ]);

        sleep(1);

        return redirect()->route('students.index')->with('message', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return Inertia::render(
            'Students/Show',
            [
                'student' => $student
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return Inertia::render(
            'Students/Edit',
            [
                'student' => $student
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age' => 'required|integer',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($student->image) {
                Storage::delete($student->image);
            }
            $imagePath = $request->file('image')->store('student_images');
            $student->image = $imagePath;
        }

        $student->name = $request->name;
        $student->age = $request->age;
        $student->status = $request->status;
        $student->save();
        sleep(1);

        return redirect()->route('students.index')->with('message', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete associated image if exists
        if ($student->image) {
            Storage::delete($student->image);
        }
        $student->delete();
        sleep(1);

        return redirect()->route('students.index')->with('message', 'Student Deleted Successfully');
    }
}
