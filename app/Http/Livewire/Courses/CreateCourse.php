<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CreateCourse extends Component
{

    public $nombre;
    public $horario;
    public $fecha_inicio;
    public $fecha_fin;

    protected $rules = [
       'nombre' => 'required|min:5',
       'horario'=>'required',
       'fecha_inicio'=>'required|date|after:yesterday',
       'fecha_fin'=>'required|date|after_or_equal:fecha_inicio'
    ];

    protected $messages = [
        'nombre.required' => 'El nombre no puede estar vacio.',
        'nombre.min' => 'el nombre debe tener minimo 5 letras.',
        'horario.required' => 'Debe seleccionar un horario.',
        'fecha_inicio.required' => 'Indique una fecha de inicio.',
        'fecha_fin.required' => 'Indique una fecha de culminación.',
    ];

    public function render()
    {
        return view('livewire.courses.create-course');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
    
        // Execution doesn't reach here if validation fails.
    
        $create = Course::create([
            'nombre' => Str::lower(Str::of($this->nombre)->squish()),
            'horario' => Str::lower(Str::of($this->horario)->squish()),
            'fecha_inicio' =>Carbon::parse($this->fecha_inicio),
            'fecha_fin' => Carbon::parse($this->fecha_fin),
        ]);
        if ($create) {
            return redirect()->to('/cursos');
        }
    }
}
