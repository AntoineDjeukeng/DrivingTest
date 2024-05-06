<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

           

            // Check if the user exists with the social provider ID
            $user = User::where('provider', $provider)
                ->where('provider_id', $socialUser->getId())
                ->first();

            // If the user does not exist, create a new user and send email verification
            if (!$user) {
                 // Check if the email already exists with a different login method
                if (User::where('email', $socialUser->getEmail())->exists()) {
                    return redirect()->route('login')->withErrors(['email' => 'This email is already registered with a different login method.']);
                }
                $passwrord = Str::random(12);
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'username' => User::generateUsername($socialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'password' => bcrypt($passwrord),
                ]);

                // Send email verification notification
                $user->sendEmailVerificationNotification();
            }

            // Log in the user
            Auth::login($user, true);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // Handle exceptions
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

}