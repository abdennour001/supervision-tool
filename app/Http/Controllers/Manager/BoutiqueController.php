<?php

namespace App\Http\Controllers\Manager;

use App\Boutique;
use App\Hardware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoutiqueController extends Controller
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

    public function storeBoutique(Request $request) {
        $userData = $request->validate([
            'nomBoutique' => 'required',
            'adresseBoutique' => 'required',
            'IPBoutique' => ['required', 'ipv4']
        ]);
        $boutique = new Boutique();
        $boutique->nom_boutique = $userData['nomBoutique'];
        $boutique->address_boutique = $userData['adresseBoutique'];

        $hardware = new Hardware();
        $hardware->snmpaddr = $userData['IPBoutique'];
        $hardware->save();
        $boutique->id_hardware = $hardware->id_hardware;
        $boutique->save();

        return back()->with('add_message', 'Vous avez ajouté "' . $userData['nomBoutique'] .'" correctement.');
    }

    public function deleteBoutique(Request $request, $idBoutique) {
        $boutique = Boutique::findOrFail($idBoutique);
        $boutique->delete();
        return back()->with('delete_message', 'Boutique "' . $boutique->nom_boutique . '" a été supprimé avec succès.');
    }

    public function updateBoutique(Request $request, $idBoutique) {
        $boutique = Boutique::findOrFail($idBoutique);
        $boutique->nom_boutique = $request['nomBoutique'];
        $boutique->address_boutique = $request['adresseBoutique'];
        if (!($boutique->hardware->snmpaddr == $request['IPBoutique'])) {
            $hardware = Hardware::find($boutique->hardware->id_hardware);
            $hardware->delete();
            $hardware = new Hardware();
            $hardware->snmpaddr = $request['IPBoutique'];
            $hardware->save();
            $boutique->id_hardware = $hardware->id_hardware;
        }
        $boutique->update();
        return back()->with('update_message', 'Boutique "' . $boutique->nom_boutique . '" a été modifié avec succès');
    }
}
