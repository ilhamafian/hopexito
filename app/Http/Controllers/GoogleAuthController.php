<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle(Request $request)
    {
        try{
            $user = Socialite::driver('google')->user();
            
            $findUser = User::where('google_id', $user->id)->first();

            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }
            else{
                  $user = User::Create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'role_id' => 2,
                    'password' => Hash::make($user->getId())
                  ]);
                  dd($user);
            }
        }
        catch (\Throwable $th){
            throw $th;
        }
    }


        // if (!$user) {
        //     $new_user = User::Create([
              

        //     ]);
        //     Auth::login($user);
        //     return redirect()->intended('dashboard');
        // } else {
        //     Auth::login($user);
        //     return redirect()->intended('dashboard');
        // }
    
}
