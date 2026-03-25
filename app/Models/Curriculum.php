<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    // テーブル名を明示
    protected $table = 'curriculums';

    /**
     * 授業詳細情報を関連テーブルと結合して取得
     */
    public static function getLessonDetail($id)
    {
        return self::join('delivery_times', 'curriculums.id', '=', 'delivery_times.curriculums_id')
            ->join('grades', 'curriculums.grade_id', '=', 'grades.id')
            ->select(
                'curriculums.*',
                'delivery_times.delivery_from',
                'delivery_times.delivery_to',
                'grades.name as grade_name'
            )
            ->where('curriculums.id', $id)
            ->first();
    }
}