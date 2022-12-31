<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOrder;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'billplz_id',
        'collection_id',
        'email',
        'name',
        'description',
        'amount',
        'paid',
        'paid_at',
        'address',
        'postcode',
        'state'
    ];
    
    public function productOrder(){
        return $this->hasMany(ProductOrder::class, 'billplz_id', 'billplz_id');
    }
}
