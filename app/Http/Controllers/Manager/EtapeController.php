<?php

namespace App\Http\Controllers\Manager;

use App\Etape;
use App\ProjetIT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EtapeController extends Controller
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

    public function store(Request $request, $idProject) {
        $etape = new Etape();
        $etape->nom_etape = $request->get('nom');
        $etape->date_debut_etape = $request->get('dateDebut');
        $etape->date_echeance_etape = $request->get('datefin');
        $etape->priorite = $request->get('priorite');
        if ($request->get('livree') == null) {
            $etape->livree = 0;
        } else {
            $etape->livree = 1;
        }
        $project = ProjetIT::findOrFail($idProject);
        $etape->projet()->associate($project);
        $etape->save();

        return back()->with(['add_message' => 'Vous avez ajouté l\'étape "' . $request->get('nom') .'" correctement.',
                                'ajax_message' => $idProject]);
    }

    public function destroy(Request $request, $id) {
        $etape = Etape::find($id);
        $etape->delete();
        return back()->with(['delete_message' => 'Vous avez supprimé "' . $etape->nom_etape .'" avec succés.',
            'ajax_message' => $etape->id_projet]);
    }
}
