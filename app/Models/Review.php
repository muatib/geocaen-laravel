<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'review'; 
    protected $primaryKey = 'Id_evaluation'; 
    public $timestamps = false; 

    
}
