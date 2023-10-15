<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $exisitingUser = User::where('email', $user->email)->first();
            if(!$exisitingUser){
                $newUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'profile_photo_path' => $user->getAvatar()
                ]);

                Auth::login($newUser);
                return redirect()->route('admin.dashboard');
            }else {
                if (!$exisitingUser->profile_photo_path) {
                    $exisitingUser->update([
                        'profile_photo_path' => $user->getAvatar(),
                    ]);
                }
                Auth::login($exisitingUser);
                return redirect()->route('user.home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return back();
        }
        $user = Socialite::driver('google')->user();
    }
}
