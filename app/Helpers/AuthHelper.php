<?php

namespace App\Helpers;

use App\Models\RegisterUser; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthHelper
{
    public static function generateCSRFToken()
    {
        return bin2hex(random_bytes(32));
    }

    public static function handleRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:50',
            'pseudo' => 'required|string|max:50|unique:Register_user',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:Register_user',
            'password' => 'required|string|min:8',
            'description' => 'required|string|max:200',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

       
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public'); 
            $validatedData['avatarurl'] = $avatarPath;
        } else {
            $validatedData['avatarurl'] = 'chemin/vers/avatar/par/defaut.jpg'; 
        }

        $validatedData['password'] = Hash::make($validatedData['password']); 

        RegisterUser::create($validatedData); 
    }

    public static function handleLogin(string $email, string $password)
    {
        $user = RegisterUser::where('email', $email)->first(); 
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user'] = $user; 
        } else {
            $GLOBALS['loginErrors'][] = 'Email ou mot de passe incorrect.';
        }
    }
}
