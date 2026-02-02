<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'status' => $this->status,
            'date' => $this->date,

            'user_id' => $this->user_id,
            'user_name' => $this->whenLoaded('user', function () {
                return $this->user ? ($this->user->name . ' ' . $this->user->surename) : 'Deleted User';
            }),

            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
