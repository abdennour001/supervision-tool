<?php

namespace App\Http\Controllers\Admin;

use App\Profil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
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

    public function destroy($profileId) {
        $profil = Profil::findOrFail($profileId);
        $profil->delete();
        return back()->with('delete_message', 'Le profil <' . $profil->login_compte . '> a été supprimé avec succès.');
    }

    public function edit($id_profile) {

        $profile = Profil::findOrFail($id_profile);
        return view('admin.edit-profile', compact('profile'));
    }

    public function update($profile_id) {
        $data = request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'email'],
            'login_compte' => ['required'],
            'numero_telephone' => ['required'],
        ]);

        $profile = Profil::findOrFail($profile_id);

        $profile->update($data);

        return redirect('/admin/list-profile')->with('update_message', 'Le profil <' . $profile->login_compte . '> a été modifié avec succès');
    }

}
