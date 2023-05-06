<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class ListStudents extends Component
{
    use WithPagination;

    public $perPage = 20;
    private $students;
    public $student;
    
    public function render()
    {
        $this->students = Student::paginate($this->perPage);
        return view('livewire.students.list-students', [
            'students' => $this->students,
        ]);
    }

    public function DelStudent($id){
        $this->student = Student::findOrFail($id);
        if ($this->student->delete()) {
            $this->mount();
            $this->render();
        }
    }
}
