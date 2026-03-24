<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
        return[
            'old_pass' => 'required | exists:users,password',
            'new_pass' => 'required | max:255 | min:8 | alpha_num',
            'new_pass_confirmation' => 'required | same:new_pass',
        ];   
    }

    public function messages() {
        return[
            'old_pass.required' => '入力必須です。',
            'old_pass.exists:users,password' => 'パスワードが違います。',
            'new_pass.required' => '入力必須です。',
            'new_pass.max:255' => '255文字以下です。',
            'new_pass.min:8' => '8文字以上です。',
            'new_pass.alpha_num' => '半角英数字で入力してください。',
            'new_pass_confirmation.required' => '入力必須です。',
            'new_pass_confirmation.same:new_pass' => 'パスワードが違います。',
        ];
    }

}
