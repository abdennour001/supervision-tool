<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarqueHardware extends Model
{
    protected $table='marque_hardware';
    protected $primaryKey='id_marque_hardware';

    /*
     * Get the hardware type.
     */
    public function typeHardware() {
        return $this->belongsTo('App\TypeHardware', 'id_type_hardware', 'id_type_hardware');
    }

    /*
     * Get the hardware list.
     */
    public function hardwares() {
        return $this->hasMany('App\Hardware', 'id_marque_hardware');
    }
}
