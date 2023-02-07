<?php

namespace App\Http\Controllers;

use App\Models\Artist;
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
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
               Auth::login($findUser);
                return redirect()->intended('explore');
            } else {
                $user = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'role_id' => 3,
                ]);
                $artist = Artist::create([
                    'id' => $user->id
                ]);
                Auth::login($user);
                return redirect()->intended('explore');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
