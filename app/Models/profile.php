<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{


    public function profile()
{
    $user = Auth::user();
    $userTrophies = DB::table('user_trophies')
        ->join('trophies', 'user_trophies.trophy_id', '=', 'trophies.id')
        ->where('user_id', $user->id)
        ->select('trophies.*', 'user_trophies.earned_at')
        ->get();

    return view('profile', [
        'user' => $user,
        'trophies' => $userTrophies ?? collect() // Si null, retourne une collection vide
    ]);
}
}
