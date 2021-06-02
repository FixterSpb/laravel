<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class VkLoginController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {

        $vkUser = Socialite::driver('vkontakte')->user();

        $user = User::whereEmail($vkUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $vkUser->getName(),
                'email' => $vkUser->getEmail(),
                'vk_id' => $vkUser->getId(),
            ]);
        }

        Auth::loginUsingId($user->id);

        Session::regenerate();


        return redirect()->route('orders.index');
    }
}
