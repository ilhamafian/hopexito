<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrder extends Model
{
    use HasFactory;
    protected $table = 'product_orders';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'billplz_id',
        'product_id',
        'price',
        'quantity',
        'size',
        'color',
        'product_image',
    ];
}
