<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialController
 * @package App\Http\Controllers
 */
class SocialController extends Controller
{
    //

    /**
     * @return \Laravel\Socialite\Contracts\User
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->user();
    }

    /**
     * @return string
     */
    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        return $user->getAvatar();
    }
}
