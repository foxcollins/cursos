<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
        'horario',
        'fecha_inicio',
        'fecha_fin'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'fecha_inicio',
        'fecha_fin'
    ];

    //functions

    //relations
    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_courses', 'course_id', 'student_id')->withTimestamps();
    }
}
