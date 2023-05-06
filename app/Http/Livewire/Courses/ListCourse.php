<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class ListCourse extends Component
{
    use WithPagination;

    public $perPage = 10;
    private $cursos;
   

    public function render()
    {
        $this->cursos = Course::paginate($this->perPage);
        return view('livewire.courses.list-course', [
            'cursos' => $this->cursos,
        ]);
    }

    public function deleteCourse($id){
        $course = Course::findOrFail($id);
        $course->students()->detach();
        if ($course->delete()) {
            $this->mount();
            $this->render();
        }
    }
}
