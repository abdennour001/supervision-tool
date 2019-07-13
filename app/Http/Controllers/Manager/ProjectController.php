<?php

namespace App\Http\Controllers\Manager;

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

    }

    public function update(Request $request, $id) {

    }
}
