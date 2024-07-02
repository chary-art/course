<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = ['English', 'Russian', 'Chinese'];
        foreach ($courses as $course) {
//            dd($course);
            Course::create([
                'course' => $course,
                'slug' => str($course)->slug(),
        ]);
        }

    }
}
