<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'テストユーザー',
            'name_kana' => 'てすとゆーざー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'grade_id' => 1,
        ]);
    }
}