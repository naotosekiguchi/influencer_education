<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curriculum;

class CurriculumSeeder extends Seeder {

    public function run(): void {
        // 小学校
        Curriculum::create([
            'title' => '小1 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校1年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 1,
        ]);

        Curriculum::create([
            'title' => '小1 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校1年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 1,
        ]);

        Curriculum::create([
            'title' => '小2 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校2年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 2,
        ]);

        Curriculum::create([
            'title' => '小2 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校2年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 2,
        ]);

        Curriculum::create([
            'title' => '小3 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校3年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 3,
        ]);

        Curriculum::create([
            'title' => '小3 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校3年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 3,
        ]);

        Curriculum::create([
            'title' => '小4 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校4年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 4,
        ]);

        Curriculum::create([
            'title' => '小4 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校4年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 4,
        ]);

        Curriculum::create([
            'title' => '小5 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校5年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 5,
        ]);

        Curriculum::create([
            'title' => '小5 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校5年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 5,
        ]);

        Curriculum::create([
            'title' => '小6 算数',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校6年生の算数です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 6,
        ]);

        Curriculum::create([
            'title' => '小6 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '小学校6年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 6,
        ]);

        // 中学校
        Curriculum::create([
            'title' => '中1 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校1年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 7,
        ]);

        Curriculum::create([
            'title' => '中1 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校1年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 7,
        ]);

        Curriculum::create([
            'title' => '中2 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校2年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 8,
        ]);

        Curriculum::create([
            'title' => '中2 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校2年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 8,
        ]);

        Curriculum::create([
            'title' => '中3 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校3年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 9,
        ]);

        Curriculum::create([
            'title' => '中3 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '中学校3年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 9,
        ]);

        // 高校
        Curriculum::create([
            'title' => '高1 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '高校1年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 10,
        ]);

        Curriculum::create([
            'title' => '高1 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '高校1年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 10,
        ]);

        Curriculum::create([
            'title' => '高2 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '高校2年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 11,
        ]);

        Curriculum::create([
            'title' => '高2 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '高校2年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 11,
        ]);

        Curriculum::create([
            'title' => '高3 数学',
            'thumbnail' => 'sample.jpg',
            'description' => '高校3年生の数学です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 0,
            'grade_id' => 12,
        ]);

        Curriculum::create([
            'title' => '高3 国語（常時公開）',
            'thumbnail' => 'sample.jpg',
            'description' => '高校3年生の国語です。',
            'video_url' => 'https://example.com',
            'alway_delivery_flg' => 1,
            'grade_id' => 12,
        ]);
    }
}