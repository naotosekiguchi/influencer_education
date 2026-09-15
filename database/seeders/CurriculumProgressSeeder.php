<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CurriculumProgress;

class CurriculumProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

        // 小1 算数：未クリア
        CurriculumProgress::create([
            'curriculums_id' => 1,
            'users_id' => 1,
            'clear_flg' => 0,
        ]);

        // 小1 国語：クリア済み
        CurriculumProgress::create([
            'curriculums_id' => 2,
            'users_id' => 1,
            'clear_flg' => 1,
        ]);
    }
}
