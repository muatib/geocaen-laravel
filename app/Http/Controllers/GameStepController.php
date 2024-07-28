<?php
namespace App\Http\Controllers;

use App\Models\GameStep;
use Illuminate\Http\Request;

class GameStepController extends Controller
{
    public function index()
    {
        $gameSteps = GameStep::with('answer')->get(); 
    
        $gameData = $gameSteps->map(function ($step) {
            return [
                'text' => $step->question,
                'clue' => $step->clue,
                'answer' => $step->answer->answer,
            ];
        }); // Pas besoin de toArray()
    
        return view('game-step', ['gameData' => $gameData]);
    }
        
    }
?>