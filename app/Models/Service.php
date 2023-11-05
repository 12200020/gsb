<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services'; // Define the table name if it differs from the model name

    // Define fillable fields if necessary
    protected $fillable = ['service_name', 'price', 'description', 'image', 'post_by'];
}
