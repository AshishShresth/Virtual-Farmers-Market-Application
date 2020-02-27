<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BidResource extends JsonResource
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
            'bids_id' => $this->id,
            'bidding_quantity' => $this->product_quantity,
            'bidding_price' => $this->bidding_price,
            'message' => $this->message,
            'bidder_id' => $this->user_id,
            'post_id' => $this->post_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
