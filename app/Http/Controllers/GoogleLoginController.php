<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $gUser = Socialite::driver('google')->user();
            $user = User::where('email', $gUser->email)->first();

            if(!$user){
                $user = User::create([
                    'name' => $gUser->name,
                    'email' => $gUser->email,
                    'password' => $gUser->id
                ]);
            }

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
