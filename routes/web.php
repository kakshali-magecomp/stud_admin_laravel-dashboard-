<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| LANGUAGE SWITCH (GLOBAL)
|--------------------------------------------------------------------------
*/

Route::get('/lang/{lang}', function ($lang) {

    if (in_array($lang, ['en', 'hi'])) {
        Session::put('lang', $lang);
    }

    return redirect()->back();

})->name('lang.switch');


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/student/dashboard', [StudentController::class, 'index'])
        ->name('student.dashboard');

    Route::get('/courses', [CourseController::class, 'index'])
        ->name('courses.index');

    Route::get('/courses/enroll/{id}', [CourseController::class, 'enroll'])
        ->name('courses.enroll');

    Route::post('/courses/enroll', [CourseController::class, 'storeEnrollment'])
        ->name('courses.storeEnrollment');

    Route::get('/professors', [ProfessorController::class, 'index'])
        ->name('professors.index');

    Route::get('/professors/{id}', [ProfessorController::class, 'show'])
        ->name('professors.show');

    Route::get('/about', [AboutController::class, 'index'])
        ->name('about.index');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = auth()->user();

    if ($user->role === 'student') {
        return redirect()->route('student.dashboard');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    abort(403);

})->middleware('auth')->name('dashboard');