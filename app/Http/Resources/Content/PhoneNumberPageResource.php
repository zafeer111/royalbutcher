<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneNumberPageResource extends JsonResource
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
            'main_heading1' => $this->main_heading1,
            'main_heading2' => $this->main_heading2,
            'sub_heading' => $this->sub_heading,
            'hint' => $this->hint,
            'placeholder' => $this->placeholder,
            'button_text' => $this->button_text,
        ];
    }
}
