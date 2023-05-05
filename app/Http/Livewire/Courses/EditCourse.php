<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EditCourse extends Component
{
    public $course;
    public $nombre;
    public $horario;
    public $fecha_inicio;
    public $fecha_fin;

    protected function rules() {
        return [
           'nombre' => 'required|min:5',
           'horario'=>'required',
           'fecha_inicio'=>'required|date|after:yesterday',
           'fecha_fin'=>'required|date|after_or_equal:fecha_inicio'
        ];  
    } 

    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacio.',
        'nombre.min' => 'el nombre debe tener minimo 5 letras.',
        'horario.required' => 'Debe seleccionar un horario.',
        'fecha_inicio.required' => 'Indique una fecha de inicio.',
        'fecha_fin.required' => 'Indique una fecha de culminación.',
    ];

    public function mount($id){
        $this->course = Course::findOrFail($id);
        $this->nombre = $this->course->nombre;
        $this->horario = $this->course->horario;
        $this->fecha_inicio = Carbon::parse($this->course->fecha_inicio)->toDateString();
        $this->fecha_fin = Carbon::parse($this->course->fecha_fin)->toDateString();
    }

    public function render()
    {
        return view('livewire.courses.edit-course');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
    
        // Execution doesn't reach here if validation fails.
        
     
            $this->course->nombre       =  Str::lower(Str::of($this->nombre)->squish());
            $this->course->horario      = Str::lower(Str::of($this->horario)->squish());
            $this->course->fecha_inicio = Carbon::parse($this->fecha_inicio);
            $this->course->fecha_fin    = Carbon::parse($this->fecha_fin);

        if ($this->course->save()) {
            return redirect()->to('/cursos');
        }
    }
}
