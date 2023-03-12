<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallets';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'bank_holder_name',
        'bank_name',
        'bank_account_number',
        'commission',
        'balance',
        'status',
    ];

    public function walletTransaction(){
        return $this->hasMany(WalletTransaction::class, 'wallet_id', 'id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
}
