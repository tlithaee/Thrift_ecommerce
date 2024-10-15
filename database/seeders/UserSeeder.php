<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Define the user data
        $users = [
            [
                'name' => 'Michael Corleone',
                'email' => 'michael@corleone.com',
                'password' => Hash::make('password123'), 
            ],
            [
                'name' => 'Regina George',
                'email' => 'regina@mean.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Tony Stark',
                'email' => 'tony@stark.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Hermione Granger',
                'email' => 'hermione@hogwarts.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Kendall Roy',
                'email' => 'kendall@roy.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Jim Halpert',
                'email' => 'jim@dundermifflin.com',
                'password' => Hash::make('password123'),
            ],
        ];

        // Insert user data into the database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
