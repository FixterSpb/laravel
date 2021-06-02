<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
//use Laravel\Socialite\Contracts\Factory as Socialite;
use Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FbLoginController extends Controller
{

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $fbUser = Socialite::driver('facebook')->user();
        $user = User::whereEmail($fbUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $fbUser->getName(),
                'email' => $fbUser->getEmail(),
                'fb_id' => $fbUser->getId(),
            ]);
        }

        Auth::loginUsingId($user->id);

        Session::regenerate();


        return redirect()->route('orders.index');
    }
}
