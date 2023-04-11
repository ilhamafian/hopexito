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
        'title',
        'price',
        'quantity',
        'size',
        'color',
    ];

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function order(){
        return $this->hasOne(Order::class, 'id', 'billplz_id');
    }
}
