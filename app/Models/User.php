<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * まとめて保存を許可するカラム
     */
    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
        'profile_image',
        'grade_id',
    ];

    /**
     * 配列やJSONにする際に隠す項目（パスワードなど）
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * データの型変換（パスワードを自動でハッシュ化する設定など）
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * ユーザー新規登録処理
     */
    public function registerUser(array $user_data): self
    {
        return self::create([
            'name'          => $user_data['name'],
            'name_kana'     => $user_data['name_kana'],
            'email'         => $user_data['email'],
            'password'      => Hash::make($user_data['password']),
            'grade_id'      => $user_data['grade_id'],
            'profile_image' => $user_data['profile_image_name'],
        ]);
    }
}