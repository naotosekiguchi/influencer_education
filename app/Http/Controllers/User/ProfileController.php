<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;


class ProfileController extends Controller {
    public function showProfileForm() {
        //プロフィール設定画面表示
        //インスタンス生成
        $Usermodel = new User();

        // 現在ログインしているユーザー(仮にID:1)
        $loginuser = 1;

        //ユーザーデータ抽出
        $user = $Usermodel->getProfile($loginuser);
        return view('user/profile_edit',['user' => $user]);
    }

    public function submitProfileEdit(ProfileRequest $request ,$id) {
        //プロフィール設定機能
        if ($request->has('register')) {//登録ボタンが押された場合
            //もし画像が選択されてたら画像のファイル名取得してstorage/app/public/images/profileに保存
            if ($request->file('profile_image') != null){
                $image = $request->file('profile_image');
                $file_name = $image->getClientOriginalName();
                $image->storeAs('images/profile', $file_name);
                $image_path = 'storage/images/profile/' . $file_name;
            }else{
                $file_name = null;
            }

            //プロフィール設定機能
            DB::beginTransaction();
            try {
                //インスタンス生成
                $Usermodel = new User();
                $Usermodel->renewUser($id, $request, $image_path);
                DB::commit();

            } catch (\Exception $e) {
                DB::rollback();
                return back();
            }

            // 現在ログインしているユーザー(仮にID:1)
            $loginuser = 1;

            //アラート表示
            session()->flash('profile_edit_message', '登録しました。');

            //トップページに推移
            $user = $Usermodel->getProfile($loginuser);
            return redirect(route('user.show.top',['user' => $user]));

        }else{//パスワード変更ボタンが押された場合
            //パスワード変更画面に推移
            return redirect()->route('user.show.password.edit');
        }
    }

    public function showPasswordFrom() {
        //パスワード変更画面表示
        //インスタンス生成
        $Usermodel = new User();

        // 現在ログインしているユーザー(仮にID:1)
        $loginuser = 1;

        //パスワード抽出
        $user = $Usermodel->getPassword($loginuser);
        return view('user/password_edit',['user' => $user]);
    }

    public function submitPasswordEdit(PasswordRequest $request ,$id) {
        //パスワード変更機能
        DB::beginTransaction();
        try {
            //インスタンス生成
            $Usermodel = new User();
            $Usermodel->renewPassword($id, $request);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        // 現在ログインしているユーザー(仮にID:1)
        $loginuser = 1;

        //プロフィール設定画面に推移
        $user = $Usermodel->getProfile($loginuser);
        return view('user/profile_edit',['user' => $user]);
    }

}
