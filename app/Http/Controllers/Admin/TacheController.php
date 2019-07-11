<?php

namespace App\Http\Controllers\Admin;

use App\FamilleTypeTache;
use App\TypeHardware;
use App\TypeSoftware;
use App\TypeTache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function storeTypeTache(Request $request) {
        $userData = [
            'taskType' => $request->get('taskType'),
            'SeuilIn' => $request->get('SeuilIn'),
            'famille' => $request->get('famille'),
        ];

        $type = new TypeTache();
        $type->libelle_type_tache = $userData['taskType'];
        $type->seuil = $userData['SeuilIn'];
        $famille = FamilleTypeTache::find($userData['famille']);
        $type->familleTypeTache()->associate($famille);
        $type->save();

        return back()->with('add_message', 'Vous avez ajouté "' . $userData['taskType'] .'" correctement.');
    }

    public function deleteTypeTache(Request $request, $id) {
        $type = TypeTache::findOrFail($id);
        $type->delete();
        return back()->with('delete_message', 'Le Type "' . $type->libelle_type_tache . '" a été supprimé avec succès.');
    }

    public function updateTypeTache(Request $request, $id) {
        $userData = [
            'taskType' => $request->get('taskType'),
            'SeuilIn' => $request->get('SeuilIn'),
            'famille' => $request->get('famille'),
        ];

        $type = TypeTache::findOrFail($id);
        $type->libelle_type_tache = $userData['taskType'];
        $type->seuil = $userData['SeuilIn'];
        $famille = FamilleTypeTache::find($userData['famille']);
        $type->familleTypeTache()->associate($famille);
        $type->update();

        return back()->with('update_message', 'Le type "' . $type->libelle_type_tache . '" a été modifié avec succès');
    }

    public function storeFamille(Request $request) {
        $userData = [
            'famille' => $request->get('famille'),
        ];

        FamilleTypeTache::create([
            'libelle_famille_type_tache' => $userData['famille'],
        ]);

        return back()->with('add_message', 'vous avez ajouté ' . $userData['famille'] .' correctement.');
    }

    public function deleteFamille(Request $request, $id) {
        $famille = FamilleTypeTache::findOrFail($id);
        $famille->delete();
        return back()->with('delete_message', 'Le Type software "' . $famille->libelle_famille_type_tache . '" a été supprimé avec succès.');
    }

    public function updateFamille(Request $request, $id) {
        $userData = [
            'libelle_famille_type_tache' => \request()->get('famille'),
        ];

        $famille = FamilleTypeTache::findOrFail($id);

        $famille->update($userData);

        return back()->with('update_message', 'La famille "' . $famille->libelle_famille_type_tache . '" a été modifié avec succès');
    }

    public function searchTypeTache(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (true) {
                $type = TypeTache::find($query);
                try {
                    return view('admin.type-tache-include', ['type' => $type])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
    }

    public function associateHardware(Request $request, $id) {
        $typeHardware = TypeHardware::findOrFail($request->get('type_hard'));
        $typeTache = TypeTache::findOrFail($id);

        if ($typeTache->typesHardware->contains($typeHardware)) {
            return back()->with('warning_message', 'Le type hardware "' . $typeHardware->libelle_type_hardware .'" a été déja associé.');
        }

        $typeTache->typesHardware()->attach($request->get('type_hard'));
        return back()->with('add_message', 'Vous avez associé "' . $typeHardware->libelle_type_hardware .'" correctement.');
    }

    public function associateSoftware(Request $request, $id) {
        $typeSoftware = TypeSoftware::findOrFail($request->get('type_soft'));
        $typeTache = TypeTache::findOrFail($id);

        if ($typeTache->typesSoftware->contains($typeSoftware)) {
            return back()->with('warning_message', 'Le type software "' . $typeSoftware->libelle_type_software .'" a été déja associé.');
        }

        $typeTache->typesSoftware()->attach($request->get('type_soft'));
        return back()->with('add_message', 'Vous avez associer "' . $typeSoftware->libelle_type_software .'" correctement.');
    }

    public function disassociateHardware(Request $request, $id_type_tache, $id_hardware) {
        $typeHardware = TypeHardware::findOrFail($id_hardware);
        $typeTache = TypeTache::findOrFail($id_type_tache);

        $typeTache->typesHardware()->detach($id_hardware);
        return back()->with('delete_message', 'Vous avez supprimé "' . $typeHardware->libelle_type_hardware .'" correctement.');
    }

    public function disassociateSoftware(Request $request, $id_type_tache, $id_software) {
        $typeSoftware = TypeSoftware::findOrFail($id_software);
        $typeTache = TypeTache::findOrFail($id_type_tache);

        $typeTache->typesSoftware()->detach($id_software);
        return back()->with('delete_message', 'Vous avez supprimé "' . $typeSoftware->libelle_type_software .'" correctement.');
    }
}
