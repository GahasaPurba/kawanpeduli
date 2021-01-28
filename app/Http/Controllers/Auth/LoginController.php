<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider1()
    {
        return FacadesSocialite::driver('Google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback1()
    {
        $googleuser = FacadesSocialite::driver('Google')->user();

        $user = User::where('provider_id', $googleuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $googleuser->getEmail(),
                'name' => $googleuser->getName(),
                'provider_id' => $googleuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider2()
    {
        return FacadesSocialite::driver('Facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback2()
    {
        $facebookuser = FacadesSocialite::driver('Facebook')->user();

        $user = User::where('provider_id', $facebookuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $facebookuser->getEmail(),
                'name' => $facebookuser->getName(),
                'provider_id' => $facebookuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the Github authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider3()
    {
        return FacadesSocialite::driver('Github')->redirect();
    }

    /**
     * Obtain the user information from Github.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback3()
    {
        $githubuser = FacadesSocialite::driver('Github')->user();

        $user = User::where('provider_id', $githubuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $githubuser->getEmail(),
                'name' => $githubuser->getName(),
                'provider_id' => $githubuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
