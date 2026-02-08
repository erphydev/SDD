<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// دقت کنید اینجا باید StoreUserRequest باشد، نه StoreCoachRequest
class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surename' => 'required|string|max:255',
            'phonenumber' => 'required|string|unique:users,phonenumber', // چک کردن یکتایی شماره
            'email' => 'required|email|unique:users,email', // چک کردن یکتایی ایمیل
            'coach_id' => 'nullable|exists:coachs,id',
        ];
    }
}
