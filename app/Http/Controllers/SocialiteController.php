<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Login gagal, coba lagi.');
        }

        $providerId = $socialUser->getId();
        $email = $socialUser->getEmail();
        $name = $socialUser->getName()
            ?: $socialUser->getNickname()
            ?: 'User';
        $avatar = $socialUser->getAvatar();

        $account = SocialAccount::where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

        if ($account) {
            Auth::login($account->user);

            if (is_null($account->user->password)) {
                return redirect()->route('profile.setup');
            }

            return $account->user->role === 'admin'
                ? redirect('/dashboard')
                : redirect('/');
        }

        $user = $email ? User::where('email', $email)->first() : null;

        if (!$user) {
            $user = User::create([
                'name'  => $name,
                'email' => $email,
                'avatar' => $avatar,
                'role' => 'user',
                'password' => null,
            ]);
        }

        SocialAccount::create([
            'provider'     => $provider,
            'provider_id'  => $providerId,
            'user_id'      => $user->id,
        ]);

        Auth::login($user);

        if (is_null($user->password)) {
            return redirect()->route('profile.setup');
        }

        return $user->role === 'admin'
            ? redirect('/dashboard')
            : redirect('/');
    }
}
