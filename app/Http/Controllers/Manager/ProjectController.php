<?php

namespace App\Http\Controllers\Manager;

use App\Etape;
use App\ProjetIT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
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

    public function store(Request $request) {
        ProjetIT::create([
           'nom_projet' => $request['nomProjet'],
           'date_lancement_projet' => $request['dateDebut'],
           'date_fin_projet' => $request['dateFin'] ,
        ]);

        return back()->with('add_message', 'vous avez ajouté ' . $request['nomProjet'] .' correctement.');
    }

    public function delete(Request $request, $id) {
        $pro = ProjetIT::findOrFail($id);
        $pro->delete();
        return back()->with('delete_message', 'Le Projet "' . $pro->nom_projet . '" a été supprimé avec succès.');
    }

    public function update(Request $request, $id) {

    }

    public function search(Request $request) {
        if ($request->ajax()) {
            $projects = ProjetIT::query()->orderByDesc('created_at')->get();
            try {
                return view('manager.table-projet-include', ['projets' => $projects])->render();
            } catch (\Throwable $e) {
                dd($e);
            }
        }
        return null;
    }

    public function searchEtapes(Request $request) {
        if ($request->ajax()) {
            $project = ProjetIT::findOrFail($request['project']);
            $etapes = $project->etapes;
            try {
                return view('manager.table-etape-include', ['project' => $project, 'etapes' => $etapes])->render();
            } catch (\Throwable $e) {
                dd($e);
            }
        }
    }

    public function searchTaches(Request $request) {
        if ($request->ajax()) {
            $etape = Etape::findOrFail($request['etape']);
            $taches = $etape->taches;
            try {
                return view('manager.table-tache-include', ['etape' => $etape, 'taches' => $taches])->render();
            } catch (\Throwable $e) {
                dd($e);
            }
        }
    }
}
