<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        // Generar 300 estudiantes y asociarlos a cursos aleatorios
        for ($i = 0; $i < 300; $i++) {
            $student = Student::factory()->create();
            $student->courses()->attach($courses->random(rand(1, 3))->pluck('id'));
        }
    }
}
