<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'product_quantity', 'bidding_price', 'message', 'user_id',
        'post_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function post(){
        return $this->belongsTo(Post::class);
    }
}
