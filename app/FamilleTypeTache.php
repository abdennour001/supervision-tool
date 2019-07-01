<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilleTypeTache extends Model
{

    protected $table = 'famille_type_tache';
    protected $primaryKey='id_famille_type_tache';

    /*
     * Get the type_taches.
     */
    public function typeTaches() {
        return $this->hasMany('App\TypeTache', 'id_famille_type_tache');
    }
}
