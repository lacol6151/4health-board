<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => '관리자',
            'email' => 'admin@4health.com',
            'password' => Hash::make('password123'),
        ]);
    }
}