<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CurriculumController extends Controller {
    public function showCurriculumList(Request $request) {

        Log::info($request->all());

        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        // ローカル開発中だけテストユーザーをログイン状態にする
        if (app()->isLocal() && !auth()->check()) {
            auth()->loginUsingId(1);
        }

        if (!auth()->check()) {
            return view('user.curriculum_list', [
                'curriculums' => collect(),
                'year' => $year,
                'month' => $month,
                'gradeId' => null,
                'loginRequired' => true,
            ]);
        }

        $gradeId = $request->input('grade_id', auth()->user()->grade_id);

        $progresses = CurriculumProgress::getUserProgresses(
            auth()->id()
        );

        $curriculums = Curriculum::getCurriculumList(
            $gradeId,
            $year,
            $month
        );

        foreach ($curriculums as $curriculum) {
            $progress = $progresses->firstWhere(
                'curriculums_id',
                $curriculum->id
            );

            $curriculum->clear_flg = $progress
                ? $progress->clear_flg
                : 0;
        }

        if ($request->ajax()) {
            return response()->json($curriculums);
        }

        return view('user.curriculum_list', compact(
            'curriculums',
            'year',
            'month',
            'gradeId'
        ));
    }
}