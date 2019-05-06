<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }

    /** Redirect to Facebook Provider */

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /** Callback to our App from Facebook */

    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        $findUser = User::where('email',$userSocial->email)->first();

        if ($findUser){
            Auth::login($findUser);

            return back()->with('status','Signed in Successfully with Facebook');
        }
        else{
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('123456');

            $user->save();

            Auth::login($user);

            return back()->with('status','Registration Successfully with Facebook');
        }
    }

    /** Redirect to Google Plus */

    public function GredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /** Callback to our App from Google Plus */

    public function GhandleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);

            return back()->with('status', 'Signed in Successfully with Google Plus');
        } else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('123456');

            $user->save();

            Auth::login($user);

            return back()->with('status', 'Registration Successfully with Google Plus');
        }
    }
}
