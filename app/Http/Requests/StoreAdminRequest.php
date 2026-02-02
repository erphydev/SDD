<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|unique:admin,phonenumber',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string',
        ];
    }
}
