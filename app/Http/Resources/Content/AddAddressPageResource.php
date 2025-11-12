<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddAddressPageResource extends JsonResource
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
            'text_recipient_info' => $this->text_recipient_info,
            'label_name' => $this->label_name,
            'label_phone' => $this->label_phone,
            'label_email' => $this->label_email,
            'text_shipping_address' => $this->text_shipping_address,
            'label_address_title' => $this->label_address_title,
            'label_address_line' => $this->label_address_line,
            'label_street_number' => $this->label_street_number,
            'label_landmark' => $this->label_landmark,
            'button_cancel' => $this->button_cancel,
            'button_save' => $this->button_save,
        ];
    }
}
