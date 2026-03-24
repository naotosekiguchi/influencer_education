<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;

class ProgressController extends Controller {
    //進捗画面表示
    public function showProgress() {
        //インスタンス生成
        $Usermodel = new User();
        $Grademodel = new Grade();
        $Curriculummodel = new Curriculum();
        $CurriculumProgressmodel = new CurriculumProgress();

        // 現在ログインしているユーザー(仮にID:1)
        $loginuser = 1;

        //ユーザーデータ抽出
        $user = $Usermodel->getProfile($loginuser);

        //全学年名データ抽出
        $grades = $Grademodel->getGrade();

        //カリキュラムデータ抽出
        $curriculums = $Curriculummodel->getCurriculum();

        //カリキュラム進捗データ抽出
        $curriculumsProgress = $CurriculumProgressmodel->getCurriculumProgress($loginuser);
        
        

        return view('user/curriculum_progress', [
            'user' => $user,
            'grades' => $grades,
            'curriculums' => $curriculums,
            'curriculumsProgress' => $curriculumsProgress
        ]);
    }
}
