<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        $grades = [
            '小学校1年生',
            '小学校2年生',
            '小学校3年生',
            '小学校4年生',
            '小学校5年生',
            '小学校6年生',
            '中学校1年生',
            '中学校2年生',
            '中学校3年生',
            '高校1年生',
            '高校2年生',
            '高校3年生'
        ];

        foreach ($grades as $grade) {
            DB::table('grades')->insert([
                'name' => $grade,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            //
        });
    }
};
