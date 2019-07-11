<?php

namespace App\Http\Controllers\Admin;

use App\Serveur;
use App\Software;
use App\TypeSoftware;
use Grpc\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\Type;
use tests\Mockery\Adapter\Phpunit\EmptyTestCase;

class SoftwareController extends Controller
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

    public function storeType(Request $request) {
        $userData = [
            'libelle_type_software' => $request->get('softwareType'),
        ];

        TypeSoftware::create([
            'libelle_type_software' => $userData['libelle_type_software'],
        ]);

        return back()->with('add_message', 'vous avez ajouté ' . $userData['libelle_type_software'] .' correctement.');
    }

    public function storeSoftware(Request $request) {
        $userData = [
            'software' => $request->get('software'),
            'id_type_software' => $request->get('type_software'),
            'id_serveur' => $request->get('serveur'),
        ];

        $software = new Software();
        $software->nom_software = $userData['software'];
        $typeSoftware = TypeSoftware::find($userData['id_type_software']);
        $software->typeSoftware()->associate($typeSoftware);
        $server = Serveur::find($userData['id_serveur']);
        $software->serveur()->associate($server);

        $software->save();
        return back()->with('add_message', 'Vous avez ajouté le software "' . $userData['software'] .'" correctement.');
    }

    public function destroyType($idTypeSoftware) {
        $typeSoftware = TypeSoftware::findOrFail($idTypeSoftware);
        $typeSoftware->delete();
        return back()->with('delete_message', 'Le Type software <' . $typeSoftware->libelle_type_software . '> a été supprimé avec succès.');
    }

    public function destroySoftware($idSoftware) {
        $software = Software::findOrFail($idSoftware);
        $software->delete();
        return back()->with('delete_message', 'Le software "' . $software->nom_software . '" a été supprimé avec succès.');
    }

    public function updateType($idTypeSoftware) {
        $userData = [
            'libelle_type_software' => \request()->get('softwareType'),
        ];

        $typeSoftware = TypeSoftware::findOrFail($idTypeSoftware);

        $typeSoftware->update($userData);

        return back()->with('update_message', 'Le type du software <' . $typeSoftware->libelle_type_software . '> a été modifié avec succès');
    }

    public function updateSoftware($idSoftware, Request $request) {
        $userData = [
            'nom_software' => $request->get('software'),
        ];

        $typeSoftware = TypeSoftware::find($request->get('type_software'));
        $serveur = Serveur::find($request->get('serveur'));

        $software = Software::findOrFail($idSoftware);
        $software->serveur()->associate($software);
        $software->typeSoftware()->associate($typeSoftware);
        $software->update($userData);
        return back()->with('update_message', 'Le software "' . $software->nom_software . '" a été modifié avec succès');
    }
}
