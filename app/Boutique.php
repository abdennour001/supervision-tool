<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    protected $table='boutique';
    protected $primaryKey='id_boutique';

    protected $fillable = ['nom_boutique', 'address_boutique', 'id_hardware'];

    /*
     * Get hardware.
     */
    public function hardware() {
        return $this->belongsTo('App\Hardware', 'id_hardware', 'id_hardware');
    }
}
