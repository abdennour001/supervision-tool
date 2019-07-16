<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeHardware extends Model
{
    protected $table = 'type_hardware';
    protected $primaryKey='id_type_hardware';

    protected $fillable = ['libelle_type_hardware'];

    /*
     * Get hardware marques.
     */
    public function marquesHardware() {
        return $this->hasMany('App\MarqueHardware', 'id_type_hardware');
    }

    public function typesTache() {
        return $this->belongsToMany('App\TypeTache', 'type_hardware_type_tache', 'id_type_hardware', 'id_type_tache');
    }
}
