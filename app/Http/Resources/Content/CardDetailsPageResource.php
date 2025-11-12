<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardDetailsPageResource extends JsonResource
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
            'text_add_card' => $this->text_add_card,
            'hint_card_holder' => $this->hint_card_holder,
            'hint_card_number' => $this->hint_card_number,
            'hint_expiry_date' => $this->hint_expiry_date,
            'hint_cvc' => $this->hint_cvc,
            'text_remember_card' => $this->text_remember_card,
            'text_total' => $this->text_total,
            'button_pay_now' => $this->button_pay_now,
        ];
    }
}
