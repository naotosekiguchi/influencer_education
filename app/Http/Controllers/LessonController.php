<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use App\Models\ClassClearCheck;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class LessonController extends Controller
{
    public function show($id)
    {
        // モデルに切り出したメソッドを呼び出し
        $lesson = Curriculum::getLessonDetail($id);

        if (!$lesson) {
            abort(404);
        }

        $now = Carbon::now();
        $isWithinPeriod = $now->between($lesson->delivery_from, $lesson->delivery_to);
        $isAvailable = ($lesson->alway_delivery_flg == true) || $isWithinPeriod;

        $isCleared = CurriculumProgress::where('users_id', Auth::id())
            ->where('curriculums_id', $id)
            ->where('clear_flg', true)
            ->exists();

        return view('lessons.show', compact('lesson', 'isAvailable', 'isCleared'));
    }

    public function complete($id)
    {
        $userId = Auth::id();

        // トランザクション開始
        DB::beginTransaction();

        try {
            // 1. 進捗登録
            CurriculumProgress::updateOrCreate(
                ['users_id' => $userId, 'curriculums_id' => $id],
                ['clear_flg' => true, 'updated_at' => now()]
            );

            // 2. クラスクリア判定
            $curriculum = Curriculum::find($id);
            if (!$curriculum) {
                throw new Exception("対象のカリキュラムが見つかりません。");
            }

            $gradeId = $curriculum->grade_id;

            // モデルに切り出した判定ロジックを使用
            if (CurriculumProgress::isClassAllCleared($userId, $gradeId)) {
                ClassClearCheck::updateOrCreate(
                    ['users_id' => $userId, 'grade_id' => $gradeId],
                    ['clear_flg' => true, 'updated_at' => now()]
                );
            }

            DB::commit();
            return back()->with('toast_message', '受講を完了しました！');

        } catch (Exception $e) {
            DB::rollBack();
            
            // エラーログに詳細を記録
            Log::error("受講完了処理エラー: " . $e->getMessage());

            return back()->with('toast_error', 'エラーが発生しました。時間を置いて再度お試しください。');
        }
    }
}