<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => '管理者',
            'kana' => 'カンリシャ',
            'email' => 'jun8.m322.k9@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}