<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // Professors Page
    public function index()
    {
        $professors = $this->getProfessors();

        return view('professors.index', compact('professors'));
    }

    // Single Professor Profile Page
    public function show($id)
    {
        $professors = $this->getProfessors();

        // Find Professor By ID
        $professor = collect($professors)->firstWhere('id', $id);

        // If professor not found
        if (!$professor) {
            abort(404);
        }

        return view('professors.show', compact('professor'));
    }

    // All Professors Data
    private function getProfessors()
    {
        return [

            [
                'id' => 1,
                'name' => 'Prof. Alan Turing',
                'department' => 'Artificial Intelligence',
                'experience' => '12 Years',
                'subject' => 'Machine Learning',
                'email' => 'alan@college.com',
                'phone' => '+91 9876543210',
                'qualification' => 'PhD in Artificial Intelligence',
                'office' => 'AI Block - Room 204',
                'image' => 'professor1.jpg',
                'description' => 'Expert in Artificial Intelligence, Machine Learning and modern computer systems.',
                'about' => 'Prof. Alan Turing is a highly experienced AI researcher and educator specializing in machine learning, deep learning, neural networks and intelligent systems. He has guided multiple student projects and research innovations in the field of Artificial Intelligence.'
            ],

            [
                'id' => 2,
                'name' => 'Dr. Grace Hopper',
                'department' => 'Computer Science',
                'experience' => '15 Years',
                'subject' => 'Programming Languages',
                'email' => 'grace@college.com',
                'phone' => '+91 9988776655',
                'qualification' => 'PhD in Computer Science',
                'office' => 'CS Block - Room 105',
                'image' => 'professor2.jpg',
                'description' => 'Specialized in compilers, coding theory and advanced programming.',
                'about' => 'Dr. Grace Hopper is known for her deep knowledge in software development, programming languages and compiler systems. She has mentored hundreds of students in modern application development.'
            ],

            [
                'id' => 3,
                'name' => 'Dr. Richard Feynman',
                'department' => 'Quantum Physics',
                'experience' => '18 Years',
                'subject' => 'Quantum Mechanics',
                'email' => 'feynman@college.com',
                'phone' => '+91 9123456780',
                'qualification' => 'PhD in Quantum Physics',
                'office' => 'Physics Lab - Room 301',
                'image' => 'professor3.jpg',
                'description' => 'World-class professor focused on quantum mechanics and particle physics.',
                'about' => 'Dr. Richard Feynman is an expert in theoretical and quantum physics with extensive research in particle behavior and modern physics concepts.'
            ],

            [
                'id' => 4,
                'name' => 'Prof. Marie Curie',
                'department' => 'Chemistry',
                'experience' => '10 Years',
                'subject' => 'Organic Chemistry',
                'email' => 'curie@college.com',
                'phone' => '+91 9090909090',
                'qualification' => 'PhD in Chemistry',
                'office' => 'Chemistry Block - Room 210',
                'image' => 'professor4.jpg',
                'description' => 'Research specialist in chemistry and laboratory sciences.',
                'about' => 'Prof. Marie Curie specializes in laboratory science, chemical reactions and modern organic chemistry research.'
            ],

            [
                'id' => 5,
                'name' => 'Dr. Ada Lovelace',
                'department' => 'Software Engineering',
                'experience' => '9 Years',
                'subject' => 'System Design',
                'email' => 'ada@college.com',
                'phone' => '+91 9871209871',
                'qualification' => 'M.Tech in Software Engineering',
                'office' => 'SE Block - Room 401',
                'image' => 'professor5.jpg',
                'description' => 'Focused on software architecture and scalable applications.',
                'about' => 'Dr. Ada Lovelace teaches advanced system design, scalable architecture and enterprise application development.'
            ],

            [
                'id' => 6,
                'name' => 'Prof. John Von Neumann',
                'department' => 'Cyber Security',
                'experience' => '20 Years',
                'subject' => 'Network Security',
                'email' => 'john@college.com',
                'phone' => '+91 9877776666',
                'qualification' => 'PhD in Cyber Security',
                'office' => 'Security Lab - Room 502',
                'image' => 'professor6.jpg',
                'description' => 'Experienced cyber security expert and ethical hacking mentor.',
                'about' => 'Prof. John Von Neumann is an experienced cyber security mentor specializing in ethical hacking, penetration testing and network protection systems.'
            ]

        ];
    }
}