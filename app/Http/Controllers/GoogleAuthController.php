<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        // This will redirect the user where I started authentication. This saves the route for redirecting after authentication.
        Redirect::setIntendedUrl(url()->previous());

        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {

        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('social_id', $google_user->getId())->first();

            if (!$user) {

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'social_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);

                // This will redirect the user where I started authentication
                return redirect()->intended(RouteServiceProvider::HOME);
                
            } else {
                Auth::login($user);
                
                // This will redirect the user where I started authentication
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
