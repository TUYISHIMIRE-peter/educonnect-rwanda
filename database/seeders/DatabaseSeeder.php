<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Giramata',
            'password' => '1234',
            'lname' => 'Teckla',
            'contact' => '0788565348',
            'email' => 'giramata@gmail.com',
        ]);
    }
}
