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
        'slug',
        'tags',
        'artist_id',
        'shopname',
        'collection_id',
        'price',
        'discount',
        'commission',
        'color',
        'category',
        'image_front',
        'image_back',
        'status',
        'sold',
        'product_image',
        'product_image_2',
        'preview'
    ];

    public function productUser(){
        return $this->hasOne(User::class,'id','artist_id');
    }
    public function productOrder(){
        return $this->hasMany(ProductOrder::class, 'product_id', 'id');
    }
    public function productCart(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    public function productCollection(){
        return $this->hasOne(ProductCollection::class, 'id', 'collection_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
