<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news =
            [
                'Learn today’s most in- demand-skills',
                'The 15 Best Website Examples for Creative & Conversion Inspiration in 2024',
                'Small business website examples'
            ];
        foreach ($news as $n) {
            Banner::create([
                'title' => $n,
                'image' => null,
                'news' => 'In the past, websites were mainly for big businesses with big budgets.
                But with today’s technology and tools, they’re feasible for businesses of any size.',
                'description' => "In publishing and graphic design, Lorem ipsum is a placeholder
             text commonly used to demonstrate the visual form of a document or a typeface
              without relying on meaningful content. Lorem ipsum may be used as a placeholder
               before final copy is available.",
            ]);
        }
    }
}
