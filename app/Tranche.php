<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    protected $table='tranche';
    protected $primaryKey='id_tranche';


    /*
     * Get tache.
     */
    public function tache() {
        return $this->belongsTo('App\TacheIT', 'id_tache');
    }
}
