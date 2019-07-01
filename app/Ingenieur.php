<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ingenieur extends Profil
{
    protected $table='profil';
    protected $primaryKey='id_profil';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('login_compte', function (Builder $query) {
           $query->where('login_compte', 'like', 'i%');
        });
    }

    public function taches() {
        return $this->hasMany('App\TacheIT', 'id_ingenieur');
    }
}
