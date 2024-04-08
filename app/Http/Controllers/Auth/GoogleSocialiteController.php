<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        // redirect user to "login with Google account" page
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            // get user data from Google
            $user = Socialite::driver('google')->user();

            // find user in the database where the email is the same as the email provided by Google
            $finduser = User::where('email', $user->email)->first();

            if ($finduser)  // if user found then do this
            {
                // Log the user in
                Auth::login($finduser);

                // redirect user to dashboard page
                return redirect('/dashboard');
            }
            // add if there is no user you show an error you have to be registerd in the system you go to pole recherche bureau and they will add you
            else
            {
                return view('users.userNotExist');
            }
            

        }
        catch (Exception $e)
        {
            dd($e->getMessage());
        }
    }
}