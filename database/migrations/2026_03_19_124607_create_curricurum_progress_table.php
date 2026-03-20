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
        Schema::create('curricurum_progress', function (Blueprint $table) {
            $table->id();
            $table->Integer('curriculums_id');
            $table->integer('users_id');
            $table->tinyInteger('clear_flg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricurum_progress');
    }
};
