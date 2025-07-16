<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png',
            'name' => 'required|string|max:20',
            'postcode' => 'required|string|max:8',
            'address' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'image.mimes' => '拡張子が.jpegもしくは.png',
            'name.required' => 'お名前を入力してください',
            'postcode.required' => '郵便番号をハイフンありで入力してください',
            'address.required' => '住所を入力してください',
        ];
    }
}
