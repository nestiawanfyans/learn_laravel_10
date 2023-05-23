<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SignUpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
//            'data_token'     => $this['token_data'],
        ];
    }
}
