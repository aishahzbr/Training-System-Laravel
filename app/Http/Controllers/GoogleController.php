<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception; 

class GoogleController extends Controller
{
    public function googlepage(){
        return socialite::driver('google')->redirect();
    }

    public function googlecallback()
{
    try {
        $user = Socialite::driver('google')->user();

        $findUser = User::where('googleid', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->intended($findUser->role == 'trainer' ? '/trainer/home' : '/home');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'googleid' => $user->id,
                'password' => encrypt('123456dummy'),
                'role' => 'default_role', // Set a default role for new users
            ]);

            Auth::login($newUser);
            return redirect()->intended($newUser->role == 'trainer' ? '/trainer/home' : '/home');
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}

}
