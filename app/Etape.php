<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table='etape';
    protected $primaryKey='id_etape';

    /*
     * Get the project.
     */
    public function projet() {
        return $this->belongsTo('App\ProjetIT', 'id_projet', 'id_projet');
    }

    /*
     * Get the taches.
     */
    public function taches() {
        return $this->hasMany('App\TacheIT', 'id_etape');
    }
}
