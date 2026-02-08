<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user');

        if (is_object($userId)) {
            $userId = $userId->id;
        }
        $userId = (int) $userId;

        return [
            'name' => 'required|string|max:255',
            'surename' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],

            'coach_id' => [
                'nullable',
                'integer',
                Rule::exists('coachs', 'id'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام اجباری است',
            'name.string' => 'نام باید متن باشد',
            'name.max' => 'نام نمی‌تواند بیشتر از 255 کاراکتر باشد',

            'surename.required' => 'نام خانوادگی اجباری است',
            'surename.string' => 'نام خانوادگی باید متن باشد',
            'surename.max' => 'نام خانوادگی نمی‌تواند بیشتر از 255 کاراکتر باشد',

            'email.required' => 'ایمیل اجباری است',
            'email.email' => 'فرمت ایمیل نامعتبر است',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است',

            'coach_id.integer' => 'مربی باید یک عدد باشد',
            'coach_id.exists' => 'مربی انتخاب شده وجود ندارد',
        ];
    }
}
