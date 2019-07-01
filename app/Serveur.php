<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Serveur extends Hardware
{
    protected $table='hardware';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $query) {
            $query->select('hardware.*')->where('type_hardware.libelle_type_hardware', 'like', '%serveur%')
            ->join('marque_hardware',   'hardware.id_marque_hardware', "=", 'marque_hardware.id_marque_hardware')
            ->join('type_hardware', 'marque_hardware.id_type_hardware', '=', 'type_hardware.id_type_hardware');
        });
    }

    /*
     * Get softwares.
     */
    public function softwares() {
        return $this->hasMany('App\Software', 'id_hardware');
    }

}
