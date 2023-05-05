<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;

class ListStudents extends Component
{
    public $students;
    public $student;
    public function mount(){
        $this->students = Student::all();
    }
    public function render()
    {
        return view('livewire.students.list-students');
    }

    public function DelStudent($id){
        $this->student = Student::findOrFail($id);
        if ($this->student->delete()) {
            $this->mount();
            $this->render();
        }
    }
}
