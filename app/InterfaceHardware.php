<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterfaceHardware extends Model
{
    protected $table='interface';
    protected $primaryKey='id_interface';

    /*
     * Get the hardware.
     */
    public function hardware() {
        return $this->belongsTo('App\Hardware', 'id_hardware', 'id_hardware');
    }
}
