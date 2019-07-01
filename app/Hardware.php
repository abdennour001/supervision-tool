<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    protected $table='hardware';
    protected $primaryKey='id_hardware';

    /*
     * Get the marque of this hardware.
     */
    public function marqueHardware() {
        return $this->belongsTo('App\MarqueHardware', 'id_marque_hardware', 'id_marque_hardware');
    }

    /*
     * Get the interfaces.
     */
    public function interfaces() {
        return $this->hasMany('App\InterfaceHardware', 'id_hardware');
    }

    /*
     * Get the Boutique.
     */
    public function boutique() {
        return $this->belongsTo('App\Boutique', 'id_hardware');
    }

    /*
     * Get incidents.
     */
    public function incidents() {
        return $this->hasMany('App\Incident', 'id_hardware_cause');
    }

    public function taches() {
        return $this->belongsToMany('App\TacheIT');
    }
}
