<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use App\User;

class StoreRequest extends Request
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
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,NULL,id,canceled_at,NULL',
            ],
            'password' => [
                'required',
                'between:6,20',
                'ascii',
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
            'email.required' => '"メールアドレス"は必ず入力してください',
            'email.email' => '"メールアドレス"を正しく入力してください',
            'email.max' => '“メールアドレス”は:max文字以内で入力してください',
            'email.unique' => '入力した“メールアドレス”は既に登録されています',
            'password.required' => '“パスワード"は必ず入力してください',
            'password.between' => '"パスワード"は:min〜:max文字で入力してください',
            'password.ascii' => '"パスワード"を正しく入力してください',

            'zip_code.required' => '"郵便番号"は必ず入力してください',
            'zip_code.numeric' => '"郵便番号"は数字のみで入力してください',
            'prefecture.required' => '"都道府県"は必ず入力してください',
            'city.required' => '"市区町村"は必ず入力してください',
            'address.required' => '"地名・番地"は必ず入力してください',
            'tel.required' => '"電話番号"は必ず入力してください',
        ];
    }
}
