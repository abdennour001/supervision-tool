<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Profil extends Authenticatable
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';

    protected $fillable = ['nom', 'prenom', 'mail', 'url_photo', 'password_compte', 'login_compte', 'numero_telephone'];

    /*
     *  Get the profil notifications.
     */
    public function notifications() {
        return $this->hasMany('App\Notification', 'id_profil');
    }
}