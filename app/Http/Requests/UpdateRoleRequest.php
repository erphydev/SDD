<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // در آپدیت، نام اگر تغییر نکرد ایراد نگیر
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->role)],

            'M_Dashboard' => 'boolean',
            'User_List' => 'boolean',
            'Add_User' => 'boolean',
            'Role_Controller' => 'boolean',
            'Role_View' => 'boolean',
            'Add_Admin' => 'boolean',
            'Coachs_List' => 'boolean',
            'Add_Coachs' => 'boolean',
            'All_Payments_List' => 'boolean',
            'Add_Payment' => 'boolean',
            'Payment_List' => 'boolean',
            'Add_Cheacks' => 'boolean',
            'Cheacks_List' => 'boolean',
            'Financial_History' => 'boolean',
            'Calendars' => 'boolean',
            'Add_Calendar' => 'boolean',
            'Edit_Profile' => 'boolean',
        ];
    }
}
