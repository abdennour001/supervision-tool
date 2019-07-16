<?php

namespace App\Http\Controllers\Engineer;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
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

    public function delete(Request $request, $id) {
        $not = Notification::findOrFail($id);
        $not->delete();
        return back()->with('delete_message', 'Vous avez supprimé "' . $not->objet .'" avec succés.');
    }
}
