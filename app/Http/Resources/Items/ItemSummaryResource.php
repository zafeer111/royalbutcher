<?php

namespace App\Http\Resources\Items;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemSummaryResource extends JsonResource
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
            // 'image' path ko poore URL mein convert karein
            'image_url' => $this->image ? Storage::url($this->image) : null,
            'base_price' => (float) $this->base_price,
            'discount_percent' => (float) $this->discount_percent,
            'discounted_price' => (float) $this->discounted_price,
            // 'category' tabhi load hoga jab controller mein 'with()' istemaal kiya ho
            'category' => $this->whenLoaded('category'),
        ];
    }
}