<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Socialite;
use App\Provider;
use App\User;

class ProviderController extends Controller
{

    /**
     * redirecting to the social provider ex: facebook  to authenticate the user
     */    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * handling the callback
     */  
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect()->route('getLogin');
        }

        $socialProvider = Provider::where('provider_id',$socialUser->getId())->first();

        if(!$socialProvider)
        {
			$user = new User();
			$user->name  = $socialUser->getName();
			$user->email = $socialUser->getEmail();
			$user->has_social_account = 1;
			$user->save();

			$social_user = new Provider();
			$social_user->user_id = $user->id;
			$social_user->provider_id = $socialUser->getId();
			$social_user->provider = $provider;
			$social_user->save();
        }
        else
            $user = $socialProvider->user;

        $token = JWTAuth::fromUser($user);
        return response()->json(['data' => compact('token')]);
    }  
}
