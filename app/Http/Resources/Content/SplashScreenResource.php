<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SplashScreenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'main_heading' => $this->main_heading,
            // 'image_url' => $this->image ? Storage::disk('public')->url($this->image) : null,
            'image_url' => $this->image ? Storage::url($this->image) : null,
        ];
    }
}
