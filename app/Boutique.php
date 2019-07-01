<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $table='boutique';
    protected $primaryKey='id_boutique';

    /*
     * Get hardware.
     */
    public function hardware() {
        return $this->hasMany('App/Hardware', 'id_hardware', 'id_hardware');
    }
}
