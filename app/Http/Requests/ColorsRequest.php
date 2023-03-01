<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',

            //
        ];
    }
    public function messages()
    {
        return [
            'required' => ' :attribute bắt buộc phải nhập',
        ];
    }

    public function attributes()

    {
        return [
            'name' => ' Tên sản phẩm',

        ];
    }
}
