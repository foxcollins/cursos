<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Course;

class TopCourses extends Component
{
    public $cursos;

    public function mount(){
        $this->cursos = Course::whereHas('students', function ($query) {
            $query->where('courses.created_at', '>=', now()->subMonths(6));
        })->withCount('students')->orderByDesc('students_count')->take(3)->get();
    }

    public function render(){
        return view('livewire.dashboard.top-courses');
    }
}




