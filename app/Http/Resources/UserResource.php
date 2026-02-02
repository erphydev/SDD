<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->name,
            'last_name' => $this->surename,
            'full_name' => $this->name . ' ' . $this->surename, // برای راحتی فرانت
            'phone' => $this->phonenumber,
            'email' => $this->email,
            'login_expiry' => $this->login_expiry,
            // اطلاعات مربی را فقط در صورت وجود بارگذاری می‌کنیم
            'coach_id' => $this->coach_id,
            // اگر بخواهید اطلاعات کامل مربی را بفرستید (در صورت وجود رابطه)
            // 'coach' => new CoachResource($this->whenLoaded('coach')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
