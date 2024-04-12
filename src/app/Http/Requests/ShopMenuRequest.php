<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopMenuRequest extends FormRequest
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
            'menu_name' => 'required|string|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/',
            'price' => 'required|integer|digits_between:2,5',
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required' => '名前を入力してください',
            'menu_name.string' => '名前は文字列でなければなりません',
            'menu_name.regex' => '記号は使用できません',
            'price.required' => '値段を設定してください',
            'price.integer' => '半角数字のみ利用可能です',
            'price.digits_between' => '2桁から5桁の間で設定して下さい'
        ];
    }
}
