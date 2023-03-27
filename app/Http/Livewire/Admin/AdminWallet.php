<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Livewire\Component;

class AdminWallet extends Component
{
    public $search;

    // approve request withdrawal
    public function approve($id){
        $wallet = Wallet::where('user_id', $id)->where('status', 2)->update(['status' => 1]);
        $walletTransaction = WalletTransaction::where('user_id', $id)->where('status', 1)->update(['status' => 2]);

        session()->flash('message', 'Withdrawal Approved');
        return redirect()->route('admin.wallets');
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $wallets = Wallet::where('status', 2)->orderBy('updated_at', 'DESC')->get();
        $wallet_requests = WalletTransaction::where('status', 1)->orderBy('updated_at','DESC')->get();
        $wallet_all = Wallet::where('name','like', $search)->orderBy('commission','desc')->paginate(12);
        $wallet_data = Wallet::get();
        $walletTransactions = WalletTransaction::where('status', 3)->orderBy('created_at','desc')->get();
    
        return view('livewire.admin.admin-wallet',compact('wallets','wallet_requests','wallet_all','wallet_data','walletTransactions'));
    }
}
