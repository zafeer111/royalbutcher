<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OtpPageResource extends JsonResource
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
            'button_text' => $this->button_text,
            'did_not_receive_text' => $this->did_not_receive_text,
            'send_again_text' => $this->send_again_text,
        ];
    }
}
