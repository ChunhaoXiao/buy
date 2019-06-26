<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BuyRequest extends FormRequest
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
            'username' => 'required',
            'card_number' => [
                'required', 
                Rule::exists('cards')->where(function($query){
                    $query->where('used', 0);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'card_number.required' => '卡号不能为空',
            'card_number.exists' => '无效的卡号',
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'username' => '用户名',
    //         'card_number' => '卡号',
    //     ];
    // }
}
