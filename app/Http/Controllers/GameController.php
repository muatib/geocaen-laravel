<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function showGameStep(Request $request)
    {
        if (!$request->session()->has('gameId')) {
            $request->session()->put('gameId', 2);  // Changé à 2
        }

        if (!$request->session()->has('currentStep')) {
            $request->session()->put('currentStep', 1);
        }

        $currentStep = $request->session()->get('currentStep');
        $gameId = $request->session()->get('gameId');

        $stepData = DB::table('game_steps')
            ->where('game_id', $gameId)
            ->where('step_order', $currentStep)
            ->first();

        if (!$stepData && $currentStep > 1) {
            return redirect()->route('game.end');
        }

        return view('game-step', [
            'stepData' => $stepData,
            'message' => session('message')
        ]);
    }

    public function startGame(Request $request)
    {
        $request->session()->put('gameId', 2);  // Changé à 2
        $request->session()->put('currentStep', 1);

        return redirect()->route('game.step');
    }

    public function checkAnswer(Request $request)
{
    $currentStep = $request->session()->get('currentStep', 1);

    $answer = DB::table('answers')
        ->join('game_steps', 'answers.game_step_id', '=', 'game_steps.id')
        ->where('game_steps.step_order', $currentStep)
        ->where('answers.is_correct', true)
        ->first();

    $isCorrect = strtolower($request->answer) === strtolower($answer->answer);

    if ($request->ajax()) {
        if ($isCorrect) {
            $request->session()->put('currentStep', $currentStep + 1);
            return response()->json([
                'correct' => true,
                'message' => 'Bonne réponse !',
                'nextUrl' => route('game.middlestep')
            ]);
        }

        return response()->json([
            'correct' => false,
            'message' => 'Mauvaise réponse, essayez encore !'
        ]);
    }

    // Fallback pour les soumissions non-AJAX
    if ($isCorrect) {
        $request->session()->put('currentStep', $currentStep + 1);
        return redirect()->route('game.middlestep');
    }

    return back()->with('message', 'Mauvaise réponse, essayez encore !');
}

    public function showMiddleStep(Request $request)
    {
        $currentStep = $request->session()->get('currentStep', 1);
        $gameId = $request->session()->get('gameId', 2);

        $stepData = DB::table('game_steps')
            ->where('game_id', $gameId)
            ->where('step_order', $currentStep - 1)
            ->first();

        return view('game-middlestep', [
            'stepData' => $stepData
        ]);
    }
 }

