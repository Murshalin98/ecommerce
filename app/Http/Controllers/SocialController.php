<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        if ($user_check = User::where('provider_id', $user->getId())->first()) {
            Auth::login($user_check, true);
            return redirect(route('dashboard'));
        }
        elseif (User::where('email', $user->getEmail())->first()){
            return "already registerd with this email address.";
        }
        else{
            $data = new User;
            $data->name = $user->getName();
            $data->email = $user->getEmail();
            $data->provider_id = $user->getId();
            $data->provider = 'github';
            $data->save();

            Auth::login($data, true);
            return redirect(route('dashboard'));
        }

        // $user->token;
    }


    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        if ($user_check = User::where('provider_id', $user->getId())->first()) {
            Auth::login($user_check, true);
            return redirect(route('dashboard'));
        }
        elseif (User::where('email', $user->getEmail())->first()){
            return "already registerd with this email address.";
        }
        else{
            $data = new User;
            $data->name = $user->getName();
            $data->email = $user->getEmail();
            $data->provider_id = $user->getId();
            $data->provider = 'google';
            $data->save();

            Auth::login($data, true);
            return redirect(route('dashboard'));
        }
    }
}
