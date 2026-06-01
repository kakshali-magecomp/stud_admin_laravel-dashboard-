<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();//Fetch all courses from the database
        return view('courses.index', compact('courses'));//send the courses data to the view
    }

    public function enroll($id)//take the course ID as a parameter
    {
        $course = Course::findOrFail($id);//Find the course by ID or fail with a 404 error
        return view('courses.enroll', compact('course'));//send the course data to the enrollment view
    }

    public function storeEnrollment(Request $request)//Handle the enrollment form submission
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);//Validate that the course_id is provided and exists in the courses table

        
        Enrollment::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
        ]);//Create a new enrollment record linking the authenticated user to the selected course

        return redirect()
            ->route('courses.index')
            ->with('success', 'Enrollment Successful!');
    }//Redirect back to the courses list with a success message
}