<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Get all courses
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
    }

    // Create a new course
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'steps' => 'required|integer',
        ]);

        $course = Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'steps' => $request->input('steps'),
        ]);

        return response()->json($course, 201); // 201 Created
    }

    // Retrieve a specific course by ID
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        return response()->json($course);
    }

    // Delete a specific course by ID
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
