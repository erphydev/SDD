<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCoachRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:coachs,phone',
            'job' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ];
    }
}
