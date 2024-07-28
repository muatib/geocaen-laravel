<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'game_step'; 
    protected $primaryKey = 'Id_game_step'; 
    public $timestamps = false; 

    
}