<?php

namespace App\Http\Resources\Items;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->image ? Storage::url($this->image) : null,
            'base_price' => (float) $this->base_price,
            'discount_percent' => (float) $this->discount_percent,
            'discounted_price' => (float) $this->discounted_price,
            'status' => $this->status,
            'customization_options' => $this->customization_options,
            'category' => $this->whenLoaded('category'),
            'created_at' => $this->created_at->toDateTimeString(),
            'add_ons' => $this->customization_options ?? [], 
        ];
    }
}