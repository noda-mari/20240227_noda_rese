<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review_star' => 'required',
            'review_comment' => ['required', 'string', 'max:400', 'regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/'],
            'review_img' => ['mimes:jpeg,png']
        ];
    }

    public function messages()
    {
        return [
            'review_star.required' => '評価を選択してください',
            'review_comment.required' => '内容を記入してください',
            'review_comment.string' => '文字列で入力してください。',
            'review_comment.max' => '400文字以内で記入してください。',
            'review_comment.regex' => '記号は使用できません。',
            'review_img.mimes' => '拡張子はjpeg,pngのみ使用可能です。'
        ];
    }
}
