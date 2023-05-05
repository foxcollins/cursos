<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //routes cursos
    Route::get('/cursos', \App\Http\Livewire\courses\ListCourse::class)->name('courses');
    Route::get('/cursos/create', \App\Http\Livewire\courses\CreateCourse::class)->name('courses.create');
    Route::get('/cursos/{id}/edit', \App\Http\Livewire\courses\EditCourse::class)->name('courses.edit');
    Route::get('/cursos/{id}/show', \App\Http\Livewire\courses\ShowCourse::class)->name('courses.show');
   

    //routes estudiantes
    Route::get('/estudiantes', \App\Http\Livewire\Students\ListStudents::class)->name('students');
    Route::get('/estudiantes/create', \App\Http\Livewire\Students\CreateStudents::class)->name('students.create');
    Route::get('/estudiantes/{id}/edit', \App\Http\Livewire\Students\EditStudents::class)->name('students.edit');
    Route::get('/estudiantes/{id}/show', \App\Http\Livewire\Students\ShowStudents::class)->name('students.show');
});
