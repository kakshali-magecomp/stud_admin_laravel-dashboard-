<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = $this->getTeamMembers();

        return view('about.index', compact('teamMembers'));
    }

    private function getTeamMembers()
    {
        return [

            [
                'id' => 1,
                'name' => 'Kakshali jani',
                'role' => 'Full Stack Developer',
                'email' => 'kakshali@studentportal.com',
                'phone' => '+91 9876543210',
                'image' => 'professor4.jpg',
                'experience' => '2 Years',
                'skills' => 'Laravel, PHP, React, Tailwind CSS',
                'description' => 'Responsible for backend development, database design and API integration.',
                'about' => 'Kakshali is a passionate full stack developer who built the Student Portal project using Laravel and Tailwind CSS. He focuses on creating responsive and user-friendly applications.'
            ],

            [
                'id' => 2,
                'name' => 'Archna Sharma',
                'role' => 'UI/UX Designer',
                'email' => 'archna@studentportal.com',
                'phone' => '+91 9988776655',
                'image' => 'professor5.jpg',
                'experience' => '3 Years',
                'skills' => 'Figma, Adobe XD, Tailwind CSS',
                'description' => 'Designs modern and attractive user interfaces.',
                'about' => 'Archna creates intuitive user experiences and beautiful designs that improve usability and accessibility.'
            ],

            [
                'id' => 3,
                'name' => 'zarna Mehta',
                'role' => 'Backend Developer',
                'email' => 'zarna@studentportal.com',
                'phone' => '+91 9871234567',
                'image' => 'professor1.jpg',
                'experience' => '4 Years',
                'skills' => 'Laravel, MySQL, REST API',
                'description' => 'Handles server-side logic and database architecture.',
                'about' => 'zarna specializes in Laravel development, database optimization and API creation.'
            ],

            [
                'id' => 4,
                'name' => 'Sakshi joshi',
                'role' => 'Frontend Developer',
                'email' => 'sakshi@studentportal.com',
                'phone' => '+91 9012345678',
                'image' => 'professor7.jpg',
                'experience' => '2 Years',
                'skills' => 'HTML, CSS, JavaScript, Tailwind',
                'description' => 'Builds responsive and interactive web interfaces.',
                'about' => 'Sakshi focuses on creating clean and responsive frontend experiences for users.'
            ],

            

        ];
    }
}