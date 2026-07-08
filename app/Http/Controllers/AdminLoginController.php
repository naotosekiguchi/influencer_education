<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller {

    // ログイン画面表示
    public function create() {
        return view('admin.login');
    }

    // ログイン処理
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => [
                'required', 
                'max:255',
            ],

            'password' => [
                'required',
                'min:8',
                'max:20',
                'regex:/^[a-zA-Z0-9]+$/',
            ],
        ],
        [
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.regex' => 'パスワードは半角英数字で入力してください。',
        ]);

        // ログイン認証
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/top')->with([
                'message' => 'ログインしました'
            ]);
        }

        return back()->withErrors([
            'message' => '入力されたメールアドレスまたはパスワードが正しくありません。',
        ])->onlyInput('email');
    }
    
    // ログアウト処理
    public function destroy(Request $request) {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }
    
}
