<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
 * Show the application's login form.
 *
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
public function showLoginForm()
{
    return view('auth.login');
}


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

    public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin') 
            {
              return redirect()->route('admin.dashboard');
            }
            else if (auth()->user()->role == 'enseignant') 
            {
              return redirect()->route('enseignant.dashboard');
            }
            else if (auth()->user()->role == 'comptable') 
            {
              return redirect()->route('comptable.dashboard');
            }
            else if (auth()->user()->role == 'etudiant') 
            {
              return redirect()->route('etudiant.dashboard');
            }
            else if (auth()->user()->role == 'parent')
            {
              return redirect()->route('parent.dashboard');
            }
            else if (auth()->user()->role == 'utilisareur')
            {
              return view('welcome');
            }

            else
            {
                response()->json(['You do not have permission to register']);
            }
        }
        else
        {
            return redirect()
            ->route('login')
            ->with('error','Incorrect email or password!.');
        }
    }
}
