<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTemplate extends Model
{
    use HasFactory;

    protected $table = 'products_template';
    protected $fillable = [
        'category',
        'commission',
        'mockup_image',
        'mockup_image_2',
        'status',
        'min',
        'color'
    ];
}
