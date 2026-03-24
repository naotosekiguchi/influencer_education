<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    public function getProfile($loginuser) {
        //ユーザー情報抽出
        $user = DB::table('users')
            ->where('users.id', $loginuser)
            ->join('grades','users.grade_id','=','grades.id')
            ->select('users.id','profile_image','users.name','grade_id','grades.name as grade_name')      
            ->first();       
        return $user;
    }

    public function renewUser($id, $data, $image_path) {
        //プロフィール設定
        DB::table('users')->where('id', $id)->update([
            'profile_image' => $image_path,
            'name' => $data->name,
            'name_kana' => $data->name_kana,
            'email' => $data->email
        ]);
    }

    public function getPassword($loginuser) {
        //パスワード抽出
        $user = DB::table('users')
            ->where('users.id', $loginuser)
            ->select('id','password')      
            ->first();       
        return $user;
    }

    public function renewPassword($id, $data) {
        //パスワード変更
        DB::table('users')->where('id', $id)->update([
            'password' => $data->new_pass
        ]);
    }
}
