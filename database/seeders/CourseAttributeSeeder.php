<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages = ['Beginner', 'Elementary', 'Pre-Intermediate'];
        foreach ($stages as $stage) {
            CourseAttribute::create([
                'course_id' => Course::pluck('id')->random(),
                'stage' => $stage,
                'description' => "In publishing and graphic design, Lorem ipsum is a placeholder
             text commonly used to demonstrate the visual form of a document or a typeface
              without relying on meaningful content. Lorem ipsum may be used as a placeholder
               before final copy is available.",
            ]);
        }
    }
}
