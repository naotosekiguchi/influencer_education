<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurriculumProgress;
use App\Models\ClassClearCheck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = DB::table('curriculums')
            ->join('delivery_times', 'curriculums.id', '=', 'delivery_times.curriculums_id')
            ->join('grades', 'curriculums.grade_id', '=', 'grades.id')
            ->select(
                'curriculums.*',
                'delivery_times.delivery_from',
                'delivery_times.delivery_to',
                'grades.name as grade_name'
            )
            ->where('curriculums.id', $id)
            ->first();

        if (!$lesson) {
            abort(404);
        }

        $now = Carbon::now();
        $isWithinPeriod = $now->between($lesson->delivery_from, $lesson->delivery_to);
        $isAvailable = ($lesson->alway_delivery_flg == 1) || $isWithinPeriod;

        $isCleared = CurriculumProgress::where('users_id', Auth::id())
            ->where('curriculums_id', $id)
            ->where('clear_flg', 1)
            ->exists();

        return view('lessons.show', compact('lesson', 'isAvailable', 'isCleared'));
    }

    public function complete($id)
    {
        $userId = Auth::id();

        // 進捗登録
        CurriculumProgress::updateOrCreate(
            ['users_id' => $userId, 'curriculums_id' => $id],
            ['clear_flg' => 1, 'updated_at' => now()]
        );

        // クラスクリア判定
        $curriculum = DB::table('curriculums')->where('id', $id)->first();
        $gradeId = $curriculum->grade_id;
        $totalCount = DB::table('curriculums')->where('grade_id', $gradeId)->count();
        $clearedCount = CurriculumProgress::where('users_id', $userId)
            ->whereIn('curriculums_id', function($query) use ($gradeId) {
                $query->select('id')->from('curriculums')->where('grade_id', $gradeId);
            })
            ->where('clear_flg', 1)
            ->count();

        if ($totalCount > 0 && $totalCount === $clearedCount) {
            ClassClearCheck::updateOrCreate(
                ['users_id' => $userId, 'grade_id' => $gradeId],
                ['clear_flg' => 1, 'updated_at' => now()]
            );
        }

        // トースト通知用のメッセージのみを返す
        return back()->with('toast_message', '受講を完了しました！');
    }
}