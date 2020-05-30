<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'image_id' => $this->id,
            //'image_url' => base64_encode(asset($this->image_url)),
            'image_url' => asset('storage/'.$this->image_url),
            'post_id' => $this->post_id,
            //'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at
        ];
    }
}
