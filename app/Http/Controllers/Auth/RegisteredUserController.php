<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * 登録画面の表示
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * 会員登録処理
     * * @param RegisterRequest $request バリデーション済みのリクエスト
     */
    public function store(RegisterRequest $request)
    {

        // 1. 画像保存処理
        $file_name = null;
        if ($request->hasFile('profile_image')) {
            $file_name = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('uploads/profiles'), $file_name);
        }

        // 2. モデルへ渡すデータの準備
        $user_params = [
            'name'               => $request->name,
            'name_kana'          => $request->kana,
            'email'              => $request->email,
            'password'           => $request->password,
            'grade_id'           => 1,
            'profile_image_name' => $file_name,
        ];

        // 3. モデルのメソッドを呼び出してユーザーを登録
        $user_instance = new User();
        $user = $user_instance->registerUser($user_params);

        // 4. ログイン実行
        Auth::login($user);

        // 5. ダッシュボードへ遷移
        return redirect('/dashboard');
    }
}