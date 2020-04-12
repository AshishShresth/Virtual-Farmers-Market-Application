<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'message', 'user_id', 'bid_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

//    public function post(){
//        return $this->belongsTo(Post::class);
//    }

    public function bid(){
        return $this->belongsTo(Bid::class);
    }

}
