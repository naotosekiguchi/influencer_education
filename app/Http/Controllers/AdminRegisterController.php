<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller {

    // 管理者新規登録処理
    public function store(Request $request) {

        // 入力内容のバリデーション
        $request->validate([
            'name' => [
                'required',
                'max:255',
            ],

            'kana' => [
                'required',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:admins,email',
            ],

            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^[a-zA-Z0-9]+$/',
            ],

            'password_confirmation' => [
                'required',
                'same:password',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
        ],
        [
            'email.unique' => '入力されたメールアドレスは既に登録されています。',
            'email.email' => 'メールアドレスの形式で入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password_confirmation.same' => 'パスワードが一致しません。',
            'password.regex' => 'パスワードは半角英数字で入力してください。',
            'password_confirmation.regex' => 'パスワード確認は半角英数字で入力してください。',
        ]);

        // 管理者情報を登録
        Admin::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 登録完了後、ログイン画面へ遷移
        return redirect()->route('admin.login');
    }
}
