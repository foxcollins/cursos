<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
class ListCourse extends Component
{
    public $cursos;
    public function mount(){
        $this->cursos = Course::all();
    }
    public function render()
    {
        return view('livewire.courses.list-course');
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
