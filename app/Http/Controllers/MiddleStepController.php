<?php
namespace App\Http\Controllers;
use App\Models\GameStep;
use Illuminate\Http\Request;

class MiddleStepController extends Controller
{
    public function index()
    {
        $gameSteps = GameStep::with('funfact')->get();

        return view('middle-step', [
            'loreData' => $gameSteps->map(function ($step) {
                return [
                    'text' => $step->funfact,
                ];
            }),
        ]);
    }
}