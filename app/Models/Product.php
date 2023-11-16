<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image', 'post_by'];

    // Additional methods or relationships can be defined here

    // Product model
    public function user()
    {
        return $this->belongsTo(User::class, 'post_by', 'id');
    }

}
