<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Str;

class CreateStudents extends Component
{

    public $nombre;
    public $apellido;
    public $birth_date;
    public $email;

    protected $rules = [
       'nombre' => 'required|min:2',
       'apellido'=>'required|min:2',
       'birth_date'=>'required|date',
       'email' => 'required|email|unique:students,email',
    ];

    protected $messages = [
        'email.required' => 'El email no puede estar vacio.',
        'email.email' => 'Formato de email no valido.',
    ];


    public function render()
    {
        return view('livewire.students.create-students');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        $create = Student::create([
            'nombre' => Str::lower(Str::of($this->nombre)->squish()),
            'apellido' => Str::lower(Str::of($this->apellido)->squish()),
            'birth_date' => $this->birth_date,
            'email' => Str::lower(Str::of($this->email)->squish()),
        ]);
        if ($create) {
            return redirect()->to('/estudiantes');
        }
    }
}
