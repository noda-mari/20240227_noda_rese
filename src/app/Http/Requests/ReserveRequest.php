<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'date' => 'required|after_or_equal::today',
            'time' => 'required',
            'number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '予約日を選択してください',
            'date.after_or_equal' => '本日以降の日付を選択してください',
            'time.required' => '時間を入力してください',
            'number.required' => '人数を入力してください',
        ];
    }
}
