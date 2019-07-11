<?php

namespace App\Http\Controllers\Manager;

use App\FamilleTypeTache;
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

    public function storeTacheIT(Request $request) {
        dd($request);
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
}
