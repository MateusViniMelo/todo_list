<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        
        $userProvider = Socialite::driver($provider)->stateless()->user();

        //dd($userProvider);

        $user = User::updateOrCreate([
            'email' => $userProvider->email
            ,
        ], [
            'name' => $userProvider->name,
            'provider_id' => $userProvider->id,
            'email' => $userProvider->email,
            'provider_token' => $userProvider->token,
            'provider_refresh_token' => $userProvider->refreshToken,
            'avatar_image_url' => $userProvider->avatar
        ]);
        
        Auth::login($user);

        return redirect('/dashboard');
    }
}
