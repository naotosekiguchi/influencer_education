<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model {
    protected $table = 'curricurum_progress';

    protected $fillable = [
        'curriculums_id',
        'users_id',
        'clear_flg',
    ];

    public static function getUserProgresses($userId) {
        return self::where('users_id', $userId)->get();
    }
}