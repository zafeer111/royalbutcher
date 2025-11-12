<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartPageContentResource extends JsonResource
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
            'text_rewards_progress' => $this->text_rewards_progress,
            'text_rewards_status' => $this->text_rewards_status,
            'placeholder_coupon' => $this->placeholder_coupon,
            'button_apply' => $this->button_apply,
            'text_total' => $this->text_total,
            'button_checkout' => $this->button_checkout,
        ];
    }
}
