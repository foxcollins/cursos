<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Models\Student;
class ShowCourse extends Component
{

    public $course;
    public $search;

    protected $listeners = [
            'eventoRender' => 'EventoRender',
        ];

    public function mount($id){
        $this->course = Course::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.courses.show-course');
    }

    public function EventoRender($id)
    {
        $this->mount($id);
        $this->render();
    }

    public function detachStudent($StudentId){

        $student = Student::find($StudentId);
        $student->courses()->detach($this->course->id);

        $this->EventoRender($this->course->id);

    }
}
