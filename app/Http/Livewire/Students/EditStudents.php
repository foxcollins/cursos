<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EditStudents extends Component
{
    public $student;
    public $nombre;
    public $apellido;
    public $birth_date;
    public $email;

    protected function rules(){
        return [
            'nombre' => 'required|min:2',
            'apellido'=>'required|min:2',
            'birth_date'=>'required|date',
            'email' => 'required|email|unique:students,email,'. $this->student->id,
        ]; 
    } 

    protected $messages = [
        'email.required' => 'El email no puede estar vacio.',
        'email.email' => 'Formato de email no valido.',
    ];

    public function mount($id){
        $this->student = Student::findOrFail($id);
        $this->nombre = $this->student->nombre;
        $this->apellido = $this->student->apellido;
        $this->email = $this->student->email;
        $this->birth_date = Carbon::parse($this->student->birth_date)->toDateString();
    }

    public function render()
    {
        return view('livewire.students.edit-students');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
    
        // Execution doesn't reach here if validation fails.
            $this->student->nombre     = Str::lower(Str::of($this->nombre)->squish());
            $this->student->apellido   = Str::lower(Str::of($this->apellido)->squish());
            $this->student->birth_date = Carbon::parse($this->birth_date)->toDateString();
            $this->student->email      = Str::lower(Str::of($this->email)->squish());
        
        if ($this->student->update()) {
            return redirect()->to('/estudiantes');
        }
    }
}
