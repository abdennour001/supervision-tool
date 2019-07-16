<?php

namespace App\Http\Controllers\Manager;

use App\TacheIT;
use App\TypeHardware;
use App\TypeTache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HardwareController extends Controller
{
    public function search(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (true) {
                $typeHardware =  TypeHardware::findorFail($query);
                $typesTache = $typeHardware->typesTache;
                $taches = array();
                foreach ($typesTache as $type) {
                    foreach ($type->taches as $tache) {
                        if(!in_array($tache, $taches)) {
                            array_push($taches, $tache);
                        }
                    }
                }
                try {
                    return view('manager.include-hardware-table', ['taches' => $taches])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
    }
}
