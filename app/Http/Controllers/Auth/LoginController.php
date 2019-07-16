<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profil;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
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

    public function index() {
        if (Session::has('profil')) {
            $profil = Session::get('profil');

            if (preg_match("/^a/", $profil->login_compte)) {
                return redirect()->route('admin', ['item' => 'new-profile']);
            } elseif (preg_match("/^m/", $profil->login_compte)) {
                return redirect()->route('manager', ['item' => 'new-project']);
            } elseif (preg_match("/^i/", $profil->login_compte)) {
                return redirect()->route('engineer', ['item' => 'notification-details']);
            }
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login_compte' => 'required',
            'password_compte' => 'required|min:3'
        ]);

        $userData = [
            'login_compte' => $request->get('login_compte'),
            'password_compte' => $request->get('password_compte')
        ];

        $result = Profil::query()->where('login_compte', '=', $userData['login_compte'])
        ->first();

        if ($result) {
            if (Hash::check($userData['password_compte'], $result->password_compte)) {
                Session::put(['profil' => $result]);

                if (preg_match("/^a/", $result->login_compte)) {
                    return redirect()->route('admin', ['item' => 'new-profile']);
                } elseif (preg_match("/^m/", $result->login_compte)) {
                    return redirect()->route('manager', ['item' => 'new-project']);
                } elseif (preg_match("/^i/", $result->login_compte)) {
                    return redirect()->route('engineer', ['item' => 'notification-details']);
                }
            } else {
                return back()->with('error', 'Login informations non valide.');
            }
        } else {
            return back()->with('error', 'Login informations non valide.');
        }
        return null;
    }

    public function logout(Request $request)
    {
        Session::forget('profil');
        return redirect('/login');
    }
}
