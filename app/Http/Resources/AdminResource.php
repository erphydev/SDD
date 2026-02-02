<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phonenumber' => $this->phonenumber,
            'role' => $this->role,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
