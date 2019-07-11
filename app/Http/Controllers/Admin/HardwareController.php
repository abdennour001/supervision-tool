<?php

namespace App\Http\Controllers\Admin;

use App\MarqueHardware;
use App\TypeHardware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\Type;

class HardwareController extends Controller
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

    public function storeType() {
        $userData = [
            'libelle_type_hardware' => \request()->get('hardwareType'),
        ];

        TypeHardware::create([
            'libelle_type_hardware' => $userData['libelle_type_hardware'],
        ]);

        return back()->with('add_message', 'vous avez ajouté ' . $userData['libelle_type_hardware'] .' correctement.');
    }

    public function storeMarque(Request $request) {
        $userData = [
            'constructeur' => $request->get('constructeur'),
            'reference' => $request->get('reference'),
        ];

        $marqueHardware = new MarqueHardware();
        $marqueHardware->constructeur = $userData['constructeur'];
        $marqueHardware->reference = $userData['reference'];
        $typeHardware = TypeHardware::where('libelle_type_hardware', $request->get('type_hardware'))->first();
        $marqueHardware->typeHardware()->associate($typeHardware);
        $marqueHardware->save();

        return back()->with('add_message', 'Vous avez ajouté "' . $userData['constructeur'] .'" correctement.');
    }

    public function destroyType($idTypeHardware) {
        $typeHardware = TypeHardware::findOrFail($idTypeHardware);
        $typeHardware->delete();
        return back()->with('delete_message', 'Le Type Hardware <' . $typeHardware->libelle_type_hardware . '> a été supprimé avec succès.');
    }

    public function destroyMarque($idMarqueHardware) {
        $marqueHardware = MarqueHardware::findOrFail($idMarqueHardware);
        $marqueHardware->delete();
        return back()->with('delete_marque_message', 'La Marque Hardware <' . $marqueHardware->constructeur . '> a été supprimé avec succès.');
    }

    public function action(Request $request) {
        if ($request->ajax()) {
            $query = $request->get('query');
            if (true) {
                $typeHardware =  TypeHardware::where('libelle_type_hardware', $query)->first();
                $data_ = $typeHardware->marquesHardware()->paginate(5);

                try {
                    return view('admin.tr-marque-hardware', ['data' => $data_])->render();
                } catch (\Throwable $e) {
                    dd($e);
                }

                $output='';
//                if ($total_row > 0) {
//                    foreach($data as $row) {
//                        $output .= "
//                                <tr>
//                                    <td>$row->constructeur</td>
//                                    <td>$row->reference</td>
//                                    <td data-label='Supprimer'>
//                                        <form action='/admin/hardware/marque-hardware/".$row->id_marque_hardware."' method='post'>
//                                            <button class='supprimer_marque btn btn-danger' type='submit'>
//                           l                     <i class='glyphicon glyphicon-remove'></i>
//                                                <strong>Supprimer</strong>
//                                            </button>
//                                        </form>
//                                    </td>
//                                </tr>
//                        ";
//                    }
//                } else {
//                    $output = '
//                    <tr>
//                        <td align="center" colspan="3">Aucune donnée disponible</td>
//                    </tr>
//                    ';
//                }
                //$data = array('data' => $output);
                /*try {
                    $data = array('tr' => view('admin.tr-marque-hardware', compact('data_'))->render(),
                        'paginator' => view('admin.links-marque-hardware', compact('data_'))->render());
                } catch (\Throwable $e) {
                    dd($e);
                }
                echo json_encode($data);*/
            }
        }
    }
}
