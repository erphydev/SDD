<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'phonenumber' => ['sometimes', Rule::unique('admin')->ignore($this->admin)],
            'password' => 'sometimes|string|min:6',
            'role' => 'nullable|string',
        ];
    }
}
