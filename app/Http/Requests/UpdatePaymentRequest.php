<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'price' => 'sometimes|string',
            'status' => ['sometimes', Rule::in(['pending', 'paid', 'reject'])],
            'date' => 'sometimes|date',
        ];
    }
}
