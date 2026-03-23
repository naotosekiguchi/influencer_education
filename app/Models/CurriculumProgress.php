<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    protected $table = 'curricurum_progress';

    protected $fillable = [
        'users_id',
        'curriculums_id',
        'clear_flg',
    ];
}