<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phonenumber' => 'required|string|unique:users,phonenumber',
            'email' => 'required|email|unique:users,email',
            'coach_id' => 'nullable|exists:coachs,id',
        ];
    }
}
