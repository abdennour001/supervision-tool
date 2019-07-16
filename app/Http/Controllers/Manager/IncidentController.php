<?php

namespace App\Http\Controllers\Manager;

use App\Hardware;
use App\Incident;
use App\Software;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncidentController extends Controller
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
        $inc = new Incident();
        $inc->descriptif_incident = $request->get('description');
        $inc->date_incident = Carbon::now()->toDateTimeString();
        $inc->etat_incident = $request->get('etat');
        $inc->severite = $request->get('severite');

        if ($request->get('software') != -1) {
            $software = Software::find($request->get('software'));
            $inc->software()->associate($software);
        }
        if ($request->get('hardware') != -1) {
            $hardware = Hardware::find($request->get('hardware'));
            $inc->hardware()->associate($hardware);
        }
        $inc->save();
        return back()->with('add_message', 'Vous avez ajouté l\'incident "' . $request['description'] .'" correctement.');
    }

    public function delete(Request $request, $id) {
        $inc = Incident::findorFail($id);
        $inc->delete();
        return back()->with('delete_message', 'L\'incident "' . $inc->descriptif_incident . '" a été supprimé avec succès.');
    }

    public function update(Request $request, $id) {
        $inc = Incident::findorFail($id);
        $inc->date_incident = Carbon::now()->toDateTimeString();;
        $inc->etat_incident = $request->get('etat');
        $inc->severite = $request->get('severite');

        if ($request->get('software') != -1) {
            $software = Software::find($request->get('software'));
            if(! $software->incidents->contains($inc)) {
                $inc->software()->associate($software);
            }
        }
        if ($request->get('hardware') != -1) {
            $hardware = Hardware::find($request->get('hardware'));
            if(! $hardware->incidents->contains($inc)) {
                $inc->hardware()->associate($hardware);
            }
        }

        $inc->update();
        return back()->with('update_message', 'L\'incident "' . $inc->descriptif_incident . '" a été modifié avec succès');
    }

    public function search(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (is_numeric($query)) {
                $incidents = Incident::query()->where('etat_incident', '=', $query)->orderByDesc('created_at')->paginate(5);
                try {
                    return view('manager.table-incident-include', ['incidents' => $incidents])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }
            } else {
                if ($query == 'i') {
                    $incidents = Incident::query()->where('id_software_cause', '!=', 'NULL')
                        ->orWhere('id_hardware_cause', '!=', 'NULL')->orderByDesc('created_at')->paginate(5);
                    try {
                        return view('manager.table-incident-include', ['incidents' => $incidents])->render();
                    } catch (\Throwable $e) {
                        dd($e);
                    }
                } else {
                    $incidents = Incident::query()->whereNull('id_software_cause')
                        ->WhereNull('id_hardware_cause')->orderByDesc('created_at')->paginate(5);
                    try {
                        return view('manager.table-incident-include', ['incidents' => $incidents])->render();
                    } catch (\Throwable $e) {
                        dd($e);
                    }
                }
            }
        }
    }
}
