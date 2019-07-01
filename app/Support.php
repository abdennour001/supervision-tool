<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support';

    protected $fillable = ['nom_support', 'prenom_contact', 'nom_contact', 'mail_support', 'numero_telephone_support', 'adresse_contact'];

}
