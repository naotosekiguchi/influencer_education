<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryTime;

class DeliveryTimeSeeder extends Seeder {

    public function run(): void {
        DeliveryTime::create([
            'curriculums_id' => 1,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 3,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 5,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 7,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 9,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 11,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 13,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 15,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 17,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 19,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 21,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);

        DeliveryTime::create([
            'curriculums_id' => 23,
            'delivery_from' => '2026-09-13 14:00:00',
            'delivery_to' => '2026-09-13 15:00:00',
        ]);
    }
}