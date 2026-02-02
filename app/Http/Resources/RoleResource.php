<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // می‌توانستیم تک تک بنویسیم، اما چون در مدل cast کردیم
            // و همه فیلدها را می‌خواهیم، می‌توانیم attributes را مستقیما بفرستیم
            // اما برای تمیزی و استاندارد بودن، بهتر است صریح باشیم:

            'permissions' => [
                'M_Dashboard' => $this->M_Dashboard,
                'User_List' => $this->User_List,
                'Add_User' => $this->Add_User,
                'Role_Controller' => $this->Role_Controller,
                'Role_View' => $this->Role_View,
                'Add_Admin' => $this->Add_Admin,
                'Coachs_List' => $this->Coachs_List,
                'Add_Coachs' => $this->Add_Coachs,
                'All_Payments_List' => $this->All_Payments_List,
                'Add_Payment' => $this->Add_Payment,
                'Payment_List' => $this->Payment_List,
                'Add_Cheacks' => $this->Add_Cheacks,
                'Cheacks_List' => $this->Cheacks_List,
                'Financial_History' => $this->Financial_History,
                'Calendars' => $this->Calendars,
                'Add_Calendar' => $this->Add_Calendar,
                'Edit_Profile' => $this->Edit_Profile,
            ],

            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
