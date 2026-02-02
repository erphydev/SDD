<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'job_title' => $this->job,
            'address' => $this->address,
            'status' => $this->status,
            'is_active' => $this->status === 'active',

            // 'students' => UserResource::collection($this->whenLoaded('users')),

            'created_at' => $this->created_at->format('Y-m-d'),
        ];
    }
}
