<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Register Page
Route::get('/', [RegisterController::class, 'create'])
    ->name('register');

// Register Form Submit
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Login Page
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

// Login Form Submit
Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

// Logout
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/student/dashboard', [StudentController::class, 'index'])
        ->name('student.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Courses Routes
    |--------------------------------------------------------------------------
    */

    // Courses Page
    Route::get('/courses', [CourseController::class, 'index'])
        ->name('courses.index');


    /*
    |--------------------------------------------------------------------------
    | Professors Routes
    |--------------------------------------------------------------------------
    */

    // Professors List Page
    Route::get('/professors', [ProfessorController::class, 'index'])
        ->name('professors.index');

    // Single Professor Details Page
    Route::get('/professors/{id}', [ProfessorController::class, 'show'])
        ->name('professors.show');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});


/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = auth()->user();

    // Redirect Student
    if ($user->role === 'student') {

        return redirect()->route('student.dashboard');

    }

    // Redirect Admin
    if ($user->role === 'admin') {

        return redirect()->route('admin.dashboard');

    }

    // Unauthorized Access
    abort(403);

})
->middleware('auth')
->name('dashboard');