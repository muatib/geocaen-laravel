<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'user_game'; // Nom de la table avec un "S" majuscule
    protected $primaryKey = 'Id_user_game'; // Clé primaire de votre table
    public $timestamps = false; // Désactiver les timestamps si vous ne les utilisez pas

    // Vos relations ici (belongsTo, hasMany, etc.)
}
