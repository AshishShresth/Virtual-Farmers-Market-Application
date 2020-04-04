<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function childs(){
        return $this->hasMany('App\Category', ' cat_p_id');
    }
}
