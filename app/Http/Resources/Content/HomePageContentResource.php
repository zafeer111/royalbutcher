<?php

namespace App\Http\Resources\Content;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageContentResource extends JsonResource
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
            'tab_new_order' => $this->tab_new_order,
            'tab_newest' => $this->tab_newest,
            'tab_most_favorite' => $this->tab_most_favorite,
            'title_hot_discounts' => $this->title_hot_discounts,
            'text_see_all' => $this->text_see_all,
            'title_top_picks' => $this->title_top_picks,
            'title_for_you' => $this->title_for_you,
            'title_order_again' => $this->title_order_again,
        ];
    }
}