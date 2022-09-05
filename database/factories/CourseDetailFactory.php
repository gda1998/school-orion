<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseDetail>
 */
class CourseDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => \App\Models\Course::inRandomOrder()->first(),
            'student_id' => \App\Models\Student::inRandomOrder()->first(),
            'qualification' => $this->faker->numberBetween(0, 10),
        ];
    }
}
