<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'posted_date' => 'required | date_format:Y-m-d\TH:i:s',
            'title' => 'required | max:255',
            'article_contents' => 'required',
        ];   
    }

    public function messages() {
        return[
            'posted_date.required' => '入力必須です。',
            'posted_date.date_format' => '入力形式はYYYY/MM/DD HH:MM:SSです。',
            'title.required' => '入力必須です。',
            'title.max' => '255文字以下です。',
            'article_contents.required' => '入力必須です。',
        ];
    }
}
