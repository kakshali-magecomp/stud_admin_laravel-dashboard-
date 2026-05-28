<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $admin = auth()->user();

        // Students
        $students = User::where('role', 'student')->latest()->get();

        // Courses Data
        $courses = [

            [
                'title' => 'Laravel Development',
                'category' => 'Web Development',
                'students' => 120,
            ],

            [
                'title' => 'React JS',
                'category' => 'Frontend',
                'students' => 95,
            ],

            [
                'title' => 'Artificial Intelligence',
                'category' => 'AI',
                'students' => 80,
            ],

            [
                'title' => 'Cyber Security',
                'category' => 'Security',
                'students' => 60,
            ],

        ];

        // Professors Data
        $professors = [

            [
                'name' => 'Dr. Rajesh Sharma',
                'department' => 'Computer Science',
                'experience' => '12 Years',
            ],

            [
                'name' => 'Prof. Neha Patel',
                'department' => 'Artificial Intelligence',
                'experience' => '8 Years',
            ],

            [
                'name' => 'Dr. Amit Verma',
                'department' => 'Cyber Security',
                'experience' => '10 Years',
            ],

        ];

        return view('admin.dashboard', compact(
            'admin',
            'students',
            'courses',
            'professors'
        ));
    }
}