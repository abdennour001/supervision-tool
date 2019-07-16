<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeSoftware extends Model
{
    protected $table='type_software';
    protected $primaryKey='id_type_software';

    protected $fillable = ['libelle_type_software'];

    /*
     * Get softwares.
     */
    public function softwares() {
        return $this->hasMany('App\Software', 'id_type_software');
    }

    public function typesTache() {
        return $this->belongsToMany('App\TypeTache', 'type_software_type_tache', 'id_type_software', 'id_type_tache');
    }
}
