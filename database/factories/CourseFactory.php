<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->catchPhrase(),
            'horario' => $this->faker->randomElement(['mañana','tarde', 'noche']),
            'fecha_inicio' => $this->randomDate('2022-01-01', '2023-05-05'),
            'fecha_fin' => $this->randomDate('2023-05-05', '2024-05-05'),
        ];
    }

    function randomDate($start, $end) {
        $timestamp = mt_rand(strtotime($start), strtotime($end));
        return Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', $timestamp));
    }
}
