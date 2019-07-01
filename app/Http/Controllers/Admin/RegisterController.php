<?php

namespace App\Http\Controllers\Admin;

use App\Profil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store() {
        $data = request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'email', 'unique:profil'],
            'url_photo' => ['required'],
            'password_compte' => ['required', 'min:3'],
            'login_compte' => ['required', 'unique:profil'],
            'numero_telephone' => ['required'],
        ]);

        $imagePath = request('url_photo')->store('uploads', 'public');

        $data = array_merge($data, ['url_photo' => $imagePath]);

        $profil = Profil::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'mail' => $data['mail'],
            'url_photo' => '/storage/' . $data['url_photo'],
            'password_compte' => Hash::make($data['password_compte']),
            'login_compte' => $data['login_compte'],
            'numero_telephone' => $data['numero_telephone'],
        ]);

        if ($profil) {
            return back()->with('register_message', 'vous avez ajouté ' . $profil->login_compte .' correctement.');
        } else {
            return back()->with('register_message', 'Something happened. Register failed!');
        }

    }
}

