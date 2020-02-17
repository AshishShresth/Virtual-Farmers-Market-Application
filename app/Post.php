<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'product_name', 'quantity', 'price_per_kg', 'date_of_harvest',
        'current_address', 'district', 'product_description', 'user_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function bids(){
        return $this->hasMany(Bid::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
