<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCustomizationPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text_add_ons' => $this->text_add_ons,
            'text_portion' => $this->text_portion,
            'button_add_to_cart' => $this->button_add_to_cart,
            'text_total' => $this->text_total,
        ];
    }
}
