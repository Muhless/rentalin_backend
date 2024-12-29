<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'Admin',
            'phone' => '1234567890',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'username' => 'John Doe',
            'phone' => '111222333444',
            'password' => Hash::make('john123'),
        ]);

        User::create([
            'username' => 'lorem',
            'phone' => '08871165551',
            'password' => Hash::make('lorem123'),
        ]);
    }
}
