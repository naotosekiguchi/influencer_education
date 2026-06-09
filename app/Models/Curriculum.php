<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model {
    public function getCurriculum() {
        //全授業タイトル抽出
        $curriculum = DB::table('curriculums')
            ->select('id','title','grade_id')
            ->get();
        return $curriculum;
    }
}
