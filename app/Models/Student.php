<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'birth_date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birth_date'
    ];

    //functions
    public function getAgeAttribute()
    {
        return  Carbon::parse($this->birth_date)->age;
    }


    //relations
    public function courses(){
        return $this->belongsToMany(Course::class, 'students_courses', 'student_id', 'course_id')->withTimestamps();
    }

}
