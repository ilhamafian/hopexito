<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomProduct extends Model
{
    use HasFactory;
    protected $table = 'custom_products';
    protected $fillable = [
        'user_id',
        'price',
        'color',
        'size',
        'quantity',
        'custom_image_front',
        'custom_image_back',
        'custom_product_image',
        'custom_product_image_2',
    ];
}
