<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            'Winter Art Contest' => "This is a great event for either the whole school or individual grade levels that have multiple classrooms. Teachers decide on a winter themed muse and have students create their own interpretation of it. ",
            'Holidays Around the World' => "This event is best held by individual grade levels to ensure there is adequate time in the schedule to fully enjoy the experience. Every classroom on a grade level picks a country that has a unique holiday tradition or celebration. ",
            'Family Feast' => "This typically falls the week before Thanksgiving Break and is a great opportunity for families to join their children and teachers for a gratitude-centered meal.

The feast can be donated from the community, made in-house, or a potluck depending on your school community! If you are looking for an easy way to get parents more involved in your classroom or school in general, this is the perfect place to start.",
        ];
        foreach ($events as $key=>$value){
            Event::create([
               'title' => $key,
               'description' => $value,
                'image' => null,
            ]);
        }
    }
}
