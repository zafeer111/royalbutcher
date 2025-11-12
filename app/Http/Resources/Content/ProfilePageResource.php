<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilePageResource extends JsonResource
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
            'main_heading' => $this->main_heading,
            'sub_heading' => $this->sub_heading,
            'name_label' => $this->name_hint,
            'email_label' => $this->email_hint,
            'password_label' => $this->password_hint,
            'name_hint' => $this->name_placeholder,
            'email_hint' => $this->email_placeholder,
            'password_hint' => $this->password_placeholder,
            'button_text' => $this->button_text,
        ];
    }
}
