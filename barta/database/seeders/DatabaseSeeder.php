<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'HB Ovaydul',
            'username' => 'Ovaydul',
            'email' => 'hovaydul@gmail.com',
            'password' => '12345678'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Tofajjal Buiyan',
            'username' => 'Tofajjal',
            'email' => 'ovaydul@outlook.com',
            'password' => 'hbhbhbhb'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Ashraf Uddin',
            'username' => 'Ashraf',
            'email' => 'laravel@gmail.com',
            'password' => 'ashraful'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Mohammad Amin',
            'username' => 'Amin',
            'email' => 'amin@gmail.com',
            'password' => '???12345'
        ]);
    }
}
