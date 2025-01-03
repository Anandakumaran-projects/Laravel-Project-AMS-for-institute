<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function create()
    {
        return view('addstudent'); // Adjust the view path as necessary
    }

    // Store a newly created student in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email', // Ensure email is unique
            'phone' => 'required|string|max:15', // Adjust max length as necessary
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others', // Ensure valid gender
            'dob' => 'required|date',
            'cname' => 'required|string|max:255',
            'joiningdate' => 'required|date',
        ]);

        // Create a new student instance and fill it with validated data
        $student = Student::create($request->all());

        // Redirect to the student index with a success message
        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    // Display a listing of the students (optional)
    public function index()
    {
        $students = Student::all(); // Fetch all students
        return view('studenttable', compact('students')); // Pass data to the view
    }
}