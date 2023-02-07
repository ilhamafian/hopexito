<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
    protected $table = 'wallet_transactions';
    protected $fillable = [
        'id',
        'user_id',
        'wallet_id',
        'balance',
        'withdrawal',
        'income',
        'new_balance',
        'status'
    ];

    public function walletTransaction(){
        return $this->hasOne(Wallet::class, 'id', 'wallet_id');
    }
    public function walletHolder(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
