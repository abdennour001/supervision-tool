<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table='software';
    protected $primaryKey='id_software';

    protected $fillable=['nom_software'];

    /*
     * Get server.
     */
    public function serveur() {
        return $this->belongsTo('App\Serveur', 'id_hardware', 'id_hardware');
    }

    /*
     * Get Type software
     */
    public function typeSoftware() {
        return $this->belongsTo('App\TypeSoftware', 'id_type_software', 'id_type_software');
    }

    /*
     * Get incidents.
     */
    public function incidents() {
        return $this->hasMany('App\Incident', 'id_software_cause');
    }

    public function taches() {
        return $this->belongsToMany('App\TacheIT');
    }
}
