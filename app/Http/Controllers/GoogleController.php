<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            dd($user);
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }else{
                //user is not yet created, so create first
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('')
                ]);
                //every user needs a team for dashboard/jetstream to work.
                //create a personal team for the user
                $newTeam = Team::forceCreate([
                    'user_id' => $newUser->id,
                    'name' => explode(' ', $user->name, 2)[0]."'s Team",
                    'personal_team' => true,
                ]);
                // save the team and add the team to the user.
                $newTeam->save();
                $newUser->current_team_id = $newTeam->id;
                $newUser->save();
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/');
            }
        // try {
        //     $user = Socialite::driver('google')->user();
        //     $finduser = User::where('google_id', $user->id)->first();
        //     dd($finduser);
        //     if($finduser){
        //         Auth::login($finduser);
        //         return redirect()->intended('dashboard');
        //     }else{
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'google_id'=> $user->id,
        //             'password' => encrypt('123456dummy')
        //         ]);
        //         Auth::login($newUser);
        //         return redirect()->intended('dashboard');
        //     }
        }
        catch (Exception $e) {
            dd($e);
        }
    }
}
// }