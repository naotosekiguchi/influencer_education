<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            // 1. ユーザーネーム：必須、50文字以内
            'name' => ['required', 'string', 'max:50'],

            // 2. カナ：必須、50文字以内、全角カタカナのみ
            'kana' => [
                'required', 
                'string', 
                'max:50', 
                'regex:/^[ァ-ヶー]+$/u' // カタカナのみの正規表現
            ],

            // 3. メールアドレス：必須、255文字以内、正しいメール形式、重複不可
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            // 4. パスワード：必須、8文字以上、50文字以内、パスワード確認と一致
            // 複雑性：大文字・小文字・数字・記号のうち2種類以上（正規表現で実装）
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'max:50',
                // 2種類以上を含んでいるかチェックする正規表現
                'regex:/^(?=(.*[a-z])(?=.*[A-Z])|(?=.*[a-z])(?=.*[0-9])|(?=.*[a-z])(?=.*[\W_])|(?=.*[A-Z])(?=.*[0-9])|(?=.*[A-Z])(?=.*[\W_])|(?=.*[0-9])(?=.*[\W_])).+$/'
            ],
        ];
    }

    /**
     * エラーメッセージを設定
     */
    public function messages(): array
    {
        return [
            'name.max'         => '50文字以内で入力してください',
            'kana.max'         => '50文字以内で入力してください',
            'kana.regex'       => 'カタカナで入力してください',
            'email.max'        => '255文字以内で入力してください',
            'email.email'      => '正しい形式で入力してください',
            'password.min'     => '8文字以上で入力してください',
            'password.max'     => '50文字以内で入力してください',
            'password.regex'   => '大文字、小文字、数字、記号のうち、2種類以上を使用してください',
            'password.confirmed' => 'パスワードと一致していません',
        ];
    }

    /**
     * 項目名の設定
     */
    public function attributes(): array
    {
        return [
            'name'     => 'ユーザーネーム',
            'kana'     => 'カナ',
            'email'    => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}