<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table='notification';
    protected $primaryKey='id_notification';

    /*
     * Get the profil of the notification
     */
    public function profil() {
        return $this->belongsTo('App\Profil', 'id_profil', 'id_profil');
    }
}
