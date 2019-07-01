<?php

namespace App\Http\Controllers\Admin;

use App\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportsController extends Controller
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
            'nom_support' => ['required', 'string', 'max:255'],
            'prenom_contact' => ['required', 'string', 'max:255'],
            'nom_contact' => ['required', 'string'],
            'mail_support' => ['required', 'email', 'unique:support'],
            'numero_telephone_support' => ['required'],
            'adresse_contact' => ['required'],
        ]);

        $support = Support::create([
            'nom_support' => $data['nom_support'],
            'prenom_contact' => $data['prenom_contact'],
            'nom_contact' => $data['nom_contact'],
            'mail_support' => $data['mail_support'],
            'numero_telephone_support' => $data['numero_telephone_support'],
            'adresse_contact' => $data['adresse_contact'],
        ]);

        return back()->with('support_message', 'vous avez ajouté ' . $support->nom_conact . ' ' . $support->prenom_contact .' correctement.');

    }


    public function destroy($id) {
        $support = Support::findOrFail($id);
        $support->delete();
        return back()->with('delete_message', 'Le support <' . $support->nom_contact . ' ' . $support->prenom_contact . '> a été supprimé avec succès.');
    }

}
