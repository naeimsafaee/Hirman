<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phoneNumber' => 'ir_mobile|required',
            'fullName' => 'max:50|required',
            'explain' => 'max:500|required'
        ];
    }
    public function messages()
    {
        return [
            'phoneNumber.ir_mobile' => 'شماره شما معتبر نیست.',
            'phoneNumber.required' => 'شماره تلفن را وارد نکردید.',
            'fullName.required' => 'نام و نام خانوادگی خود را وارد نکردید.',
            'fullName.max' => 'اسم شما طولانی است.',
            'explain.required' => 'فیلد توضیحات اجباری است.',
            'explain.max' => 'توضیحات شما طولانی است.',
        ];
    }
}
