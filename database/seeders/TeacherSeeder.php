<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [

            'name' => 'Myrat',
            'surname' => 'Annayew',
            'major' => 'Chemistry teacher',
            'experience' => '5 years',
            'degree' => 'Master degree',
            'hobby' => 'travel, read books',
            'image' => null,
            'course_id' => 1,
        ];
        {
        Teacher::create([
            'name' => $teachers['name'],
            'surname' => $teachers['surname'],
            'major' => $teachers['major'],
            'experience' => $teachers['experience'],
            'degree' => $teachers['degree'],
            'hobby' => $teachers['hobby'],
            'image' => $teachers['image'],
            'course_id' => 1,
            ]);
        }

    }
}
