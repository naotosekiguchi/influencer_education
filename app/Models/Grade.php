<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Grade extends Model
{
    public function getGrade() {
        //全学年名抽出
        $grade = Grade::all();       
        return $grade;
    }
}
