<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            'name' => 'Myrat',
            'surname' => 'Annayew',
            'password' => '1234',
            'email' => 'myrat@gmail.com',
            'role' => User::ROLE_USER,
            'image' => null,
        ];
        {
            User::create([
                'name' => $users['name'],
                'surname' => $users['surname'],
                'email' => $users['email'],
                'password' => $users['password'],
                'role' => $users['role'],
                'image' => $users['image'],
            ]);
        }
    }
}
