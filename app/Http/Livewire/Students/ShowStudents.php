<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;

class ShowStudents extends Component
{
    public $student;


    public function mount($id){
        $this->student = Student::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.students.show-students');
    }
}
