<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $student = Auth::user();

        $colleges = collect([
            [
                'name' => 'Oxford Engineering Institute',
                'campus' => 'North Campus, Building A',
                'dean' => 'Dr. Robert Chen',
                'library_hours' => '08:00 AM - 10:00 PM',
                'notice' => 'Mid-term examination schedule has been posted on the main notice board.',
                'image' => 'clgcampus.jpg',
                'courses' => ['Computer Science Engineering', 'Mechanical Engineering', 'Data Structures & AI'],
                'professors' => [
                    ['name' => 'Prof. Alan Turing', 'dept' => 'AI Dept', 'img' => 'professor1.jpg'],
                    ['name' => 'Dr. Grace Hopper', 'dept' => 'Coding Theory', 'img' => 'professor2.jpg']
                ]
            ],
            [
                'name' => 'Stanford Science Academy',
                'campus' => 'West Wing Complex',
                'dean' => 'Prof. Sarah Jenkins',
                'library_hours' => '24/7 Open',
                'notice' => 'Annual tech fest registrations close this Friday at 5:00 PM.',
                'image' => 'clgcampus1.jpg',
                'courses' => ['Biotechnology', 'Astrophysics', 'Quantum Computing'],
                'professors' => [
                    ['name' => 'Dr. Richard Feynman', 'dept' => 'Quantum Physics', 'img' => 'professor1.jpg'],
                    ['name' => 'Prof. Marie Curie', 'dept' => 'Chemistry Lab', 'img' => 'professor2.jpg']
                ]
            ],
            [
                'name' => 'MIT Tech & Management College',
                'campus' => 'Main Tech Square',
                'dean' => 'Dr. Alan Turing',
                'library_hours' => '07:00 AM - 11:00 PM',
                'notice' => 'Campus placement drive begins next week. Update your resumes.',
                'image' => 'clgcampus2.jpg',
                'courses' => ['Cyber Security', 'Financial Management', 'Business Analytics'],
                'professors' => [
                    ['name' => 'Prof. John Von Neumann', 'dept' => 'Cybersecurity', 'img' => 'professor1.jpg'],
                    ['name' => 'Dr. Ada Lovelace', 'dept' => 'System Dynamics', 'img' => 'professor2.jpg']
                ]
            ]
        ]);

        // Pagination Logic
        $perPage = 1;

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = $colleges->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginatedColleges = new LengthAwarePaginator(
            $currentItems,
            $colleges->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('student.dashboard', [
            'student' => $student,
            'colleges' => $paginatedColleges
        ]);
    }
}