<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

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
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $facebook = Socialite::driver('facebook')->user();

        $findUser = User::whereEmail($facebook->email)->first();

        if($findUser){

            Auth::login($findUser);

            return redirect('/home');

        }else{

         $user = new User;

         $user->name = $facebook->name;
         $user->email = $facebook->email;
         $user->password = bcrypt(123456);

         $user->save();

         Auth::login($facebook);

         return redirect('/home');

        }
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function googleHandleProviderCallback()
    {
        $google = Socialite::driver('google')->stateless()->user();

        $findUser = User::whereEmail($google->email)->first();

        if($findUser){

            Auth::login($findUser);

            return redirect('/home');

        }else{

         $user = new User;

         $user->name = $google->name;
         $user->email = $google->email;
         $user->password = bcrypt(123456);

         $user->save();

         Auth::login($google);

         return redirect('/home');

        }
    }
}
