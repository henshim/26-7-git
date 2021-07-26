<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCheckRequest extends FormRequest
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
            'name' =>'required|min:2|max:50',
            'age' =>'required|numeric|min:18'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required'=>'Phải có tên',
            'name.min'=>'Phải có ít nhất 2 ký tự',
            'name.max'=> 'Chỉ được phép tối đa 50 ký tự',
            'age.required' => 'Phải có tuổi',
            'age.numeric'=>'Phải là kiểu số',
            'age.min'=>'Bạn phải ít nhất 18 tuổi!'
        ];
        return $messages;
    }
}
