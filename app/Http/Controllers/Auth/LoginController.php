<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/top';

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
        if ($request->isMethod('post')) {
            $data = $request->only('mail', 'password');

            $pass = $request->input('password');
            $hiddenPass = str_repeat('*', strlen($pass));
            $request->session()->put('pass', $hiddenPass);
            // $session = $request->session()->put($hiddenPass);

            // dd($hiddenPass);
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if (Auth::attempt($data)) {
                return redirect('/top');
            }
        }
        return view("auth.login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }
}
