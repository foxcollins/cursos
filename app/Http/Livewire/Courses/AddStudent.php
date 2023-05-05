<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Str;
class AddStudent extends Component
{

    public $search;
    public $course_id;
    public $result;


    public function mount($id){
        $this->course_id = $id;
    }
    public function render()
    {   
        if ($this->search!="") {
            $this->result = Student::where('email',Str::lower($this->search))->first();
        }else{
            $this->result = null;
        }

        return view('livewire.courses.add-student', ['result' => $this->result]);
    }

    public function assignCourse($id)
    {
        $student = Student::findOrFail($id);
        $student->courses()->attach($this->course_id);
        $this->mount($this->course_id);
        $this->render();
        $this->search='';
        $this->emitUp('eventoRender', $this->course_id);
        $this->emit('modalHide',['id'=>'defaultModal']);

    }
}
