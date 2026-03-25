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

    /**
     * クラス内の全授業が完了しているか判定
     */
    public static function isClassAllCleared($userId, $gradeId)
    {
        // クラス内の全授業数を取得
        $totalCount = Curriculum::where('grade_id', $gradeId)->count();

        // ユーザーがクリアした授業数を取得
        $clearedCount = self::where('users_id', $userId)
            ->whereIn('curriculums_id', function($query) use ($gradeId) {
                $query->select('id')->from('curriculums')->where('grade_id', $gradeId);
            })
            ->where('clear_flg', true)
            ->count();

        return ($totalCount > 0 && $totalCount === $clearedCount);
    }
}