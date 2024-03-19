<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagerRegisterRequest extends FormRequest
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
            'name' => 'required|string|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/',
            'email' => 'required|email|unique:store_managers',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前は文字列でなければなりません',
            'name.regex' => '記号は使用できません',
            'email.required' => 'emailを入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.unique' => 'このメールアドレスは既に使われています',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください。'
        ];
    }
}
