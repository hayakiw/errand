<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use App\User;

class UpdateRequest extends Request
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
            'last_name' => [
                'required',
                'max:50',
            ],
            'first_name' => [
                'required',
                'max:50',
            ],
            'zip_code' => [
                'required',
                'numeric',
            ],
            'prefecture' => [
                'required',
            ],
            'city' => [
                'required',
                'max:100',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'building' => [
                'max:255',
            ],
            'tel' =>[
                'required',
                'numeric',
            ],
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'last_name.required' => '"姓"は必ず入力してください',
            'last_name.max' => '"姓"は:max文字以内で入力してください',
            'first_name.required' => '"名"は必ず入力してください',
            'first_name.max' => '"名"は:max文字以内で入力してください',

            'zip_code.required' => '"郵便番号"は必ず入力してください',
            'zip_code.numeric' => '"郵便番号"は数字のみで入力してください',
            'prefecture.required' => '"都道府県"は必ず入力してください',
            'city.required' => '"市区町村"は必ず入力してください',
            'address.required' => '"地名・番地"は必ず入力してください',
            'tel.required' => '"電話番号"は必ず入力してください',
        ];
    }
}
