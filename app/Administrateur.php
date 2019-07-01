<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Profil
{
    protected $table='profil';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('login_compte', function (Builder $query) {
            $query->where('login_compte', 'like', 'a%');
        });
    }
}
