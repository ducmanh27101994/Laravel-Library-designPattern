<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStudent extends FormRequest
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
            //
            'student_name'=>'required|max:30',
            'class'=>'required|string|max:7',
            'phone'=>'required|string|max:10',
            'address'=>'required|max:255'
        ];
    }

    function messages()
    {
        return [
            //
            'required'=>':attribute Khong duoc de trong',
            'max'=>":attribute Khong duoc qua :max ky tu",

        ];
    }

    function attributes()
    {
        return
        [
            'student_name'=>'Ten hoc sinh',
            'class'=>'Lop',
            'phone'=>'So dien thoai',
            'address'=>'Dia chi'
        ];

    }
}
