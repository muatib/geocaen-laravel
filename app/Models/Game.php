<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'game'; 
    protected $primaryKey = 'Id_game'; 
    public $timestamps = false; 

    
}