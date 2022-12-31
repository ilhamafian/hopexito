<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    use HasFactory;
    
    protected $table = 'products';
    protected $fillable = [
        'title',
        'tags',
        'shopname',
        'price',
        'commission',
        'image_front',
        'image_front_name',
        'image_back',
        'front_shirt',
        'back_shirt'
    ];
}
