<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopDataRequest extends FormRequest
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
            'area_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required|string|regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/',
            'shop_img' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前は文字列でなければなりません',
            'name.regex' => '記号は使用できません',
            'area_id.required' => 'エリアを選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'description.required' => '店舗説明を入力してください',
            'description.string' => '店舗説明は文字列でなければなりません',
            'description.regex' => '記号は使用できません',
            'shop_img.required' => '店舗イメージを添付してください'
        ];
    }
}
