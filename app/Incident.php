<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table='incident';
    protected $primaryKey='id_incident';

    /*
     * Get software.
     */
    public function software() {
        return $this->belongsTo('App\Software', 'id_software_cause', 'id_software');
    }

    /*
     * Get hardware.
     */
    public function hardware() {
        return $this->belongsTo('App\Hardware', 'id_hardware_cause', 'id_hardware');
    }
}
