<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->name(),
            'email' => $this->faker->email(),
            'birth_date' => $this->randomDate('1960-01-01', '2010-05-05'),
        ];
    }

    function randomDate($start, $end) {
        $timestamp = mt_rand(strtotime($start), strtotime($end));
        return Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', $timestamp));
    }
}
