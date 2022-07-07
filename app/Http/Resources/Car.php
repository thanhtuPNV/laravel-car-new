<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Car extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            // 'name' => $this->name,
            // 'image' => "http://127.0.0.1:8000/image/".$this->image,
            // 'price' => $this->price,
            // 'decriptions' => $this->decriptions,
            // 'mf_id' => $this->mf_id,
        ];
    }
}
