<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutPageContentResource extends JsonResource
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
            'text_shipping' => $this->text_shipping,
            'text_add_address' => $this->text_add_address,
            'text_date_time' => $this->text_date_time,
            'text_select_date_time' => $this->text_select_date_time,
            'text_payment' => $this->text_payment,
            'text_select_payment_method' => $this->text_select_payment_method,
            'button_proceed' => $this->button_proceed,
        ];
    }
}
