<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamePresController extends Controller
{
    public function index()
    {
        return view('game-pres'); 

    }
}
