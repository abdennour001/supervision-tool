<?php

namespace App\Http\Controllers\Manager;

use App\TypeHardware;
use App\TypeSoftware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoftwareController extends Controller
{
    public function search(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (true) {
                $typeSoftware =  TypeSoftware::findorFail($query);
                $typesTache = $typeSoftware->typesTache;
                $taches = array();
                foreach ($typesTache as $type) {
                    foreach ($type->taches as $tache) {
                        if(!in_array($tache, $taches)) {
                            array_push($taches, $tache);
                        }
                    }
                }
                try {
                    return view('manager.include-software-table', ['taches' => $taches])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
    }
}
