<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'user' => new UserResource($this->whenLoaded('user')),
            // Additionaly when we make the APIs for users and Categories we can use the above code to get the data from the database
        ];

        //     'name' => $this->user->name,
        //     'title' => $this->title,
        //     'details' => $this->details,
        //     'price' => $this->price,

        // ];

    }
}
