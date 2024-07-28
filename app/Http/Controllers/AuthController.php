<?php
namespace App\Http\Controllers;

use App\Models\RegisterUser; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use App\Helpers\AuthHelper; 
use Exception;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('accueil'));
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        try {
            AuthHelper::handleRegistration($request);
            return redirect()->route('login')->with('registerSuccess', true);
        } catch (Exception $e) {
            return back()->withErrors([
                'register' => $e->getMessage(),
            ])->withInput();
        }
    }
}

