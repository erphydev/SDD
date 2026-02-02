<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCoachRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'phone' => ['sometimes', Rule::unique('coachs')->ignore($this->coach)],
            'job' => 'sometimes|string|max:255',
            'address' => 'nullable|string',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }
}
