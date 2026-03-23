<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LessonPreviewSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 学年データ（grades）
        // カラム名を created_at / updated_at に修正しました
        $gradeId = DB::table('grades')->insertGetId([
            'name' => '小学校１年生',
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        // 2. カリキュラムデータ（curriculums）
        $curriculumId = DB::table('curriculums')->insertGetId([
            'title' => 'サンプル授業タイトル',
            'description' => "これはテスト用の授業説明文です。\n設計書通りに表示されるか確認してください。",
            'thumbnail' => 'sample.jpg',
            'video_url' => 'https://www.w3schools.com/html/mov_bbb.mp4',
            'alway_delivery_flg' => 0,
            'grade_id' => $gradeId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. 配信期間データ（delivery_times）
        DB::table('delivery_times')->insert([
            'curriculums_id' => $curriculumId,
            'delivery_from' => Carbon::now()->subDays(1),
            'delivery_to' => Carbon::now()->addDays(7),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}