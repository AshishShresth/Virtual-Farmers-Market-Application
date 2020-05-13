<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'price' => $this->price_per_kg,
            'date_of_product_harvest' => Carbon::parse($this->date_of_harvest)->format('d/m/Y'),
            'location' => $this->current_address,
            'district' => $this->district,
            'product_description' => $this->product_description,
//            'seller_id' => $this->user_id,
//            'category_id' => $this->category_id,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y') ,

            'user' => new UserResource( $this->user ),
            'category' => new CategoryResource( $this->category ),
            'images' => ImageResource::collection( $this->images ),
            //'comments' => CommentResource::collection( $this->comments ),
            'bids' => BidResource::collection( $this->bids),


        ];
    }
}
