<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $fillable = [
        'id',
        'bio',
        'cover_image',
        'facebook',
        'twitter',
        'instagram',
        'dribble',
        'behance',
        'pinterest',
        'deviantart',
        'tiktok',
    ];
}
