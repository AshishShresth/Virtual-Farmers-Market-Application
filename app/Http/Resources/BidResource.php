<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'post_id' => $this->post_id,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' =>  Carbon::parse($this->updated_at)->format('d/m/Y'),
            'bidder' => new UserResource( $this->user ),
        ];
    }
}
