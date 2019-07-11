<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        if (! Session::has('profil')) {
            return redirect('/login');
        } else {
            $profil = Session::get('profil');
            if ($profil->login_compte[0] == $request->getRequestUri()[1] || ($profil->login_compte[0] == 'i' && $request->getRequestUri()[1] == 'e'))
            {
                return $next($request);
            }
            else {
                return abort(404);
            }
        }
    }
}
