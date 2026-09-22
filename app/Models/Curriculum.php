<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryTime;
use App\Models\CurriculumProgress;

class Curriculum extends Model {
    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'video_url',
        'alway_delivery_flg',
        'grade_id',
    ];

    public function deliveryTimes() {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id');
    }

    public function progress() {
        return $this->hasMany(
            CurriculumProgress::class,
            'curriculums_id'
        );
    }

    // 指定された学年・年月のカリキュラムを取得
    public static function getCurriculumList($gradeId, $year, $month) {
        return self::with('deliveryTimes')
            ->where('grade_id', $gradeId)
            ->where(function ($query) use ($year, $month) {

                $query->where('alway_delivery_flg', 1)
                    ->orWhereHas('deliveryTimes', function ($query) use ($year, $month) {

                        $query->whereYear('delivery_from', $year)
                            ->whereMonth('delivery_from', $month);

                    });

            })
            ->get();
    }
}