<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $images = ['banner01.png', 'banner02.png', 'banner03.png', 'banner04.png'];

        foreach ($images as $img) {
            Banner::create([
                'image' => $img,
            ]);
        }
    }
}