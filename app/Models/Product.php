<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image', 'post_by'];

    // Additional methods or relationships can be defined here

    // Example: A product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
