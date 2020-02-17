<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'post_id' => $this->id,
            'product_name' => $this->product_name,
            'product_quantity' => $this->quantity,
            'date_of_product_harvest' => $this->date_of_harvest,
            'location' => $this->current_address,
            'district' => $this->district,
            'product_description' => $this->product_description,
            'seller_id' => $this->user_id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
