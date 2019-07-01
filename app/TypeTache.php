<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTache extends Model
{
    protected $table='type_tache';
    protected $primaryKey='id_type_tache';

    /*
     * Get the famille_type_tache.
     */
    public function familleTypeTache() {
        return $this->belongsTo('App\FamilleTypeTache', 'id_famille_type_tache', 'id_famille_type_tache');
    }

    /*
     * Get the Tache.
     */
    public function taches() {
        return $this->hasMany('App\TacheIT', 'id_type_tache');
    }

    public function typesHardware() {
        return $this->belongsToMany('App\TypeHardware');
    }

    public function typesSoftware() {
        return $this->belongsToMany('App\TypeSoftware');
    }
}
