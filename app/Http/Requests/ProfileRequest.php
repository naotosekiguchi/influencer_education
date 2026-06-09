<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() {
        if ($this->has('register')){
            return[
                'profile_image' => 'mimes:jpg,png,jpeg',
                'name' => 'required | max:255 | regex:/^[^\x01-\x7E\xA1-\xDF]*$/',
                'name_kana' => 'required | max:255 | regex:/^[^\x01-\x7E\xA1-\xDF]*$/ | regex:/^[ァ-ヶー]+$/u',
                'email' => 'required | max:255 | alpha_num | email',
            ];   
        }else{
            return[];
        }
    }

    public function messages() {
        return[
            'profile_image.mimes' => '対応していないファイル形式です。jpg, png, jpeg形式の画像を選択してください。',
            'name.required' => '入力必須です。',
            'name.max' => '255文字以下です。',
            'name.regex' => '全角で入力してください。',
            'name_kana.required' => '入力必須です。',
            'name_kana.max' => '255文字以下です。',
            'name_kana.regex' => '全角で入力してください。',
            'name_kana.regex' => 'カタカナで入力してください。',
            'email.required' => '入力必須です。',
            'email.max' => '255文字以下です。',
            'email.alpha_num' => '半角英数字で入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください。',

        ];
    }
}
