<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id', // کاربر باید وجود داشته باشد
            'price' => 'required|string', // اگرچه استرینگ است، شاید بخواهید numeric هم چک کنید
            'status' => ['required', Rule::in(['pending', 'paid', 'reject'])],
            'date' => 'required|date',
        ];
    }
}
