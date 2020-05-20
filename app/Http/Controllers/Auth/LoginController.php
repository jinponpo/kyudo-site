<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     public function authenticate()
    {
        $email = 'guest@guest.com';
        $password = 'guestpass';

        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }
        return back();
    }
     
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback(Request $request, string $provider)
    {
        if($provider === 'twitter') {
            $providerUser = Socialite::driver($provider)->user();
        } else {
            $providerUser = Socialite::driver($provider)->stateless()->user();
        }
 
        $user = User::where('email', $providerUser->getEmail())->first();
 
        if ($user) {
            $this->guard()->login($user, true);
            return $this->sendLoginResponse($request);
        }
        return redirect()->route('register.{provider}', [
            'provider' => $provider,
            'email' => $providerUser->getEmail(),
            'token' => $providerUser->token,
        ]);   
    }
}
