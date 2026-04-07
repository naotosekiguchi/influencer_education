<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class TopController extends Controller {
    //トップページ画面表示
    public function showTop() {
        return view('user/top');
    }
}
