<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
class StudentController extends Controller
{

public function index()
{
    return Student::all();
}


public function list()
{
    $students = Student::all();
    return view('students.index', compact('students'));
}


public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
    ]);

    return Student::create($data);
}

public function show($id)
{
    return Student::findOrFail($id);
}

public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return response()->json(['message' => 'Student deleted successfully']);
}
}
