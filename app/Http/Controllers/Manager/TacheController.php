<?php

namespace App\Http\Controllers\Manager;

use App\Etape;
use App\FamilleTypeTache;
use App\Ingenieur;
use App\Notification;
use App\TacheIT;
use App\TypeTache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TacheController extends Controller
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

    public function storeTacheIT(Request $request, $idEtape) {
        $tache = new TacheIT();
        $tache->date_affectation_tache = $request->get('dateAffectation');
        $tache->date_debut_tache = $request->get('dateDebut');
        $tache->date_fin_tache = $request->get('datefin');
        $tache->duree = $request->get('duree');
        $tache->etat = $request->get('etat');

        $ing = Ingenieur::findOrFail($request->get('engineer'));
        $type = TypeTache::findOrFail($request->get('typeTache'));
        $etape = Etape::find($idEtape);

        $tache->ingenieur()->associate($ing);
        $tache->typeTache()->associate($type);
        $tache->etape()->associate($etape);

        $tache->save();

        $notification = new Notification();
        $notification->date_notification = Carbon::now()->toDateTimeString();
        $notification->objet = 'Nouvelle tache';
        $notification->contenu = 'Le manager ' . Session::get('profil')->nom . ' ' . Session::get('profil')->prenom
                                    . ' vous avez affecté une tache, dans le projet ' . $etape->projet->nom_projet .'.';
        $notification->urgence = $etape->priorite;
        $notification->profil()->associate($ing);
        $notification->save();

        return back()->with(['add_message' => 'Vous avez ajouté la tache correctement.',
            'ajax_message2' => $idEtape]);
    }

    public function searchTypeTache(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (true) {
                $famille = FamilleTypeTache::find($query);
                try {
                    return view('manager.type-tache-ajax-include', ['famille' => $famille])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
    }

    public function destroyTacheIT(Request $request, $id) {
        $tache = TacheIT::find($id);
        $tache->delete();
        return back()->with(['delete_message' => 'Vous avez supprimé "' . $tache->id_tache .'" avec succés.',
            'ajax_message2' => $tache->id_etape]);
    }
}
