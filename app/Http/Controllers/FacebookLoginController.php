<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try{
            $fUser = Socialite::driver('facebook')->user();
            //dd($fUser);
            $user = User::where('facebook_id', $fUser->id)->first();

            if (! $user) {
                $user = User::create([
                    'name' => $fUser->name,
                    'email' => $fUser->email,
                    'facebook_id' => $fUser->id,
                    'password' => bcrypt($fUser->id),
                ]);
            }

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } catch(\Exception $e) {
            dd($e);
        }

    }
}
