<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'product_id',
        'email',
        'shopname',
        'title',
        'quantity',
        'price',
        'subtotal',
        'weight',
        'size',
        'color',
        'product_image',
    ];
}
