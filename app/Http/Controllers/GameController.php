<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    /**
     * Show the current game step
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showGameStep(Request $request)
    {
        if (!$request->session()->has('gameId')) {
            $request->session()->put('gameId', 1);
        }

        if (!$request->session()->has('currentStep')) {
            $request->session()->put('currentStep', 1);
        }

        $currentStep = $request->session()->get('currentStep');
        $gameId = $request->session()->get('gameId');

        if (Auth::check()) {
            $gameSession = DB::table('game_sessions')
                ->where('user_id', Auth::id())
                ->where('status', 1)
                ->first();

            if (!$gameSession) {
                DB::table('game_sessions')->insert([
                    'user_id' => Auth::id(),
                    'start_date' => now(),
                    'status' => 1,
                    'game_step_id' => $currentStep,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        $stepData = DB::table('game_steps')
            ->where('game_id', $gameId)
            ->where('step_order', $currentStep)
            ->first();


        if (!$stepData && $currentStep > 1) {
            if (Auth::check()) {

                DB::table('game_sessions')
                    ->where('user_id', Auth::id())
                    ->where('status', 1)
                    ->update([
                        'status' => 2,
                        'updated_at' => now()
                    ]);

                $this->checkTrophies(Auth::id());
            }
            return redirect()->route('game.end');
        }

        return view('game-step', [
            'stepData' => $stepData,
            'message' => session('message')
        ]);
    }

    /**
     * Start a new game or resume existing one
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function startGame(Request $request)
    {
        $request->session()->put('gameId', 1);
        $request->session()->put('currentStep', 1);

        if (Auth::check()) {
            $existingSession = DB::table('game_sessions')
                ->where('user_id', Auth::id())
                ->where('status', 1)
                ->first();

            if ($existingSession) {
                $request->session()->put('currentStep', $existingSession->game_step_id);
            } else {
                DB::table('game_sessions')->insert([
                    'user_id' => Auth::id(),
                    'start_date' => now(),
                    'status' => 1,
                    'game_step_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('game.step');
    }

    /**
     * Check the answer provided by user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function checkAnswer(Request $request)
    {
        $currentStep = $request->session()->get('currentStep', 1);


        $answer = DB::table('answers')
            ->join('game_steps', 'answers.game_step_id', '=', 'game_steps.id')
            ->where('game_steps.step_order', $currentStep)
            ->where('answers.is_correct', true)
            ->first();

        $isCorrect = strtolower($request->answer) === strtolower($answer->answer);

        if ($isCorrect && Auth::check()) {

            DB::table('game_sessions')
                ->where('user_id', Auth::id())
                ->where('status', 1)
                ->update([
                    'game_step_id' => $currentStep + 1,
                    'updated_at' => now()
                ]);


            $currentStreak = session('correct_streak', 0);
            session(['correct_streak' => $currentStreak + 1]);
        } else {

            session(['correct_streak' => 0]);

            DB::table('game_sessions')
                ->where('user_id', Auth::id())
                ->where('status', 1)
                ->increment('wrong_answers');
        }

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

        if ($isCorrect) {
            $request->session()->put('currentStep', $currentStep + 1);
            return redirect()->route('game.middlestep');
        }

        return back()->with('message', 'Mauvaise réponse, essayez encore !');
    }

    /**
     * Show the intermediate step between questions
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
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

    /**
     * Check and award trophies based on game achievements
     *
     * @param int $userId
     * @return void
     */
    private function checkTrophies(int $userId)
{
    // Get all completed games for this user
    $completedGames = DB::table('game_sessions')
        ->where('user_id', $userId)
        ->where('status', 2)
        ->count();

    // Get the current completed session
    $currentSession = DB::table('game_sessions')
        ->where('user_id', $userId)
        ->where('status', 2)
        ->orderBy('updated_at', 'desc')
        ->first();

    // Get all sessions to check for perfect games
    $perfectGames = DB::table('game_sessions')
        ->where('user_id', $userId)
        ->where('status', 2)
        ->where('wrong_answers', 0)
        ->count();

    // 1. Apprenti Détective - First completed game
    if ($completedGames === 1) {
        $this->awardTrophy($userId, 'Apprenti Détective');
    }

    // 2. Détective Confirmé - 5 completed games
    if ($completedGames === 5) {
        $this->awardTrophy($userId, 'Détective Confirmé');
    }

    // Check current session specific achievements
    if ($currentSession) {
        // 6. Sans Faute - Complete a game with no wrong answers
        if ($currentSession->wrong_answers == 0) {
            $this->awardTrophy($userId, 'Sans Faute');
        }

        // Check time-based achievements
        $duration = strtotime($currentSession->updated_at) - strtotime($currentSession->start_date);

        // 4. Éclair - Complete under 10 minutes
        if ($duration < 600) {
            $this->awardTrophy($userId, 'Éclair');
        }

        // 5. Super Sonic - Complete under 5 minutes
        if ($duration < 300) {
            $this->awardTrophy($userId, 'Super Sonic');
        }
    }

    // 7. Sherlock - Complete 3 games without errors
    if ($perfectGames >= 3) {
        $this->awardTrophy($userId, 'Sherlock');
    }

    // Check streak-based achievements
    $streak = session('correct_streak', 0);

    // 8. Premier Pas - 3 correct answers in a row
    if ($streak >= 3) {
        $this->awardTrophy($userId, 'Premier Pas');
    }

    // 9. Sur la Piste - 5 correct answers in a row
    if ($streak >= 5) {
        $this->awardTrophy($userId, 'Sur la Piste');
    }

    // Clean up session data
    session()->forget(['wrong_answers', 'correct_streak']);
}


    /**
     * Award a trophy to the user
     *
     * @param int $userId
     * @param string $trophyName
     * @return void
     */
    private function awardTrophy(int $userId, string $trophyName)
    {
        $trophy = DB::table('trophies')
            ->where('name', $trophyName)
            ->first();

        if (!$trophy) {
            return;
        }

        $existing = DB::table('user_trophies')
            ->where('user_id', $userId)
            ->where('trophy_id', $trophy->id)
            ->exists();

        if (!$existing) {
            DB::table('user_trophies')->insert([
                'user_id' => $userId,
                'trophy_id' => $trophy->id,
                'earned_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            session()->flash('trophy_earned', [
                'name' => $trophy->name,
                'description' => $trophy->description
            ]);
        }

    }
    /**
     * Show the end game screen
     *
     * @return \Illuminate\View\View
     */
    public function endGame()
    {
        return view('game-end');
    }
}
