<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Tutor::factory(10)->create();
        \App\Models\Student::factory(30)->create();
        \App\Models\Course::factory(50)->create();
        \App\Models\CourseDetail::factory(200)->create();
    }
}
