<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          return [
            'Company President' => $this->name,
            'website' => $this->website,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'service' => $this->service,

        ];
    }
}
