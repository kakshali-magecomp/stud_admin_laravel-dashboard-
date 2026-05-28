<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CourseController extends Controller
{
    public function index()
    {
        $courses = [

            [
                'title' => 'Computer Sci. Engineering',
                'category' => 'Engineering',
                'duration' => '4 Years',
                'students' => 320,
                'image' => 'ComputerScienceEngineering.jpg',
                'description' => 'Learn programming, AI, databases, algorithms, networking and software engineering.'
            ],

            [
                'title' => 'Cyber Security',
                'category' => 'Technology',
                'duration' => '3 Years',
                'students' => 180,
                'image' => 'CyberSecurity.jpg',
                'description' => 'Understand ethical hacking, network security, penetration testing and digital forensics.'
            ],

            [
                'title' => 'Business Analytics',
                'category' => 'Management',
                'duration' => '2 Years',
                'students' => 220,
                'image' => 'BusinessAnalytics.jpg',
                'description' => 'Analyze business data using statistics, AI and visualization techniques.'
            ],

            [
                'title' => 'Mechanical Engineering',
                'category' => 'Engineering',
                'duration' => '4 Years',
                'students' => 290,
                'image' => 'MechanicalEngineering.jpg',
                'description' => 'Study machines, robotics, thermodynamics and industrial engineering systems.'
            ],

            [
                'title' => 'Artificial Intelligence',
                'category' => 'Technology',
                'duration' => '2 Years',
                'students' => 150,
                'image' => 'ArtificialIntelligence.jpg',
                'description' => 'Master machine learning, neural networks, deep learning and AI tools.'
            ],

            [
                'title' => 'Financial Management',
                'category' => 'Commerce',
                'duration' => '3 Years',
                'students' => 200,
                'image' => 'FinancialManagement.jpg',
                'description' => 'Learn accounting, investments, financial planning and business management.'
            ]

        ];

        return view('courses.index', compact('courses'));
    }
}
