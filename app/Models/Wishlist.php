<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'product_id',
        'email',
        'title',
        'price',
    ];

}
