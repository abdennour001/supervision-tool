<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacheIT extends Model
{
    protected $table='tache_it';
    protected $primaryKey='id_tache';

    protected $fillable=['date_affectation_tache', 'date_debut_tache', 'date_fin_tache', 'duree', 'etat'];

    /*
     * Get the type_tache.
     */
    public function typeTache() {
        return $this->belongsTo('App\TypeTache', 'id_type_tache', 'id_type_tache');
    }

    /*
     * Get ingenieur.
     */
    public function ingenieur() {
        return $this->belongsTo('App\Ingenieur', 'id_ingenieur', 'id_profil');
    }

    /*
     * Get etape.
     */
    public function etape() {
        return $this->belongsTo('App\Etape', 'id_etape', 'id_etape');
    }

    /*
     * Get tranches.
     */
    public function tranches() {
        return $this->hasMany('App\Tranche', 'id_tache', 'id_tache');
    }

    public function hardwares() {
        return $this->belongsToMany('App\Hardware');
    }

    public function softwares() {
        return $this->belongsToMany('App\Software');
    }
}
