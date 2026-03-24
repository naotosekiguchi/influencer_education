<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CurriculumProgress extends Model
{
    public function getCurriculumProgress($loginuser) {
        //カリキュラム進捗データ抽出
        $curriculumProgress = DB::table('curricurum_progress')
            ->where('curricurum_progress.users_id', $loginuser)
            ->where('curricurum_progress.clear_flg', 1)
            ->select('curriculums_id')
            ->get();
        return $curriculumProgress;
    }
}
