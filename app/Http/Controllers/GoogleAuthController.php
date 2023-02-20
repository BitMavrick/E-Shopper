<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
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

                return redirect()->route('home');
            } else {
                Auth::login($user);

                return redirect()->route('home');
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
