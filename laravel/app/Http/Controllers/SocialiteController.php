<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function init($provider): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialService $service, $provider): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $service->updateUser($user);

        if($authUser)
        {
            \Auth::login($authUser);
            return redirect()->route('account');
        }

        throw new \Exception('Not found');
    }
}
