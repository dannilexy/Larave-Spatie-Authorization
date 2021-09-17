<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;



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
    // if(!Auth::user()->active) {
    //     Auth::logout();
    //     return redirect('login')->withErrors(['Your account is inactive']);
    // }

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    protected function validateLogin(Request $request)
    {
        $user = User::where($this->username(), '=', $request->input($this->username()))->first();
        if ($user && $user->isActive != 1 ) {

            throw ValidationException::withMessages([$this->username() => __('This account is has not been activated')]);
           // return redirect('login')->withErrors(['Your account is inactive']);
        }
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
