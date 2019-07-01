<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetIT extends Model
{

    protected $table = 'projet_it';
    protected $primaryKey='id_projet';

    /*
     * Get the etape of the project
     */
    public function etapes() {
        return $this->hasMany('App\Etape', 'id_projet');
    }
}
