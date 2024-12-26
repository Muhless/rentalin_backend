<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'email' => 'admin123@gmail.com',
            'phone' => '1234567890',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'username' => 'John Doe',
            'email' => 'john@gmail.com',
            'phone' => '111222333444',
            'password' => Hash::make('john123'),
        ]);

        User::create([
            'username' => 'lorem',
            'email' => 'lorem@gmail.com',
            'phone' => '08871165551',
            'password' => Hash::make('lorem123'),
        ]);
    }
}
