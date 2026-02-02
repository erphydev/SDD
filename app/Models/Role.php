<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'M_Dashboard',
        'User_List',
        'Add_User',
        'Role_Controller',
        'Role_View',
        'Add_Admin',
        'Coachs_List',
        'Add_Coachs',
        'All_Payments_List',
        'Add_Payment',
        'Payment_List',
        'Add_Cheacks',
        'Cheacks_List',
        'Financial_History',
        'Calendars',
        'Add_Calendar',
        'Edit_Profile',
    ];

    /**
     * تبدیل خودکار 0 و 1 دیتابیس به true و false برای فرانت‌اند
     */
    protected $casts = [
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
