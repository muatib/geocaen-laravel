<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * AuthController handles user authentication and registration.
 *
 * This controller manages all authentication-related processes including:
 * - User registration with avatar upload
 * - Login/Logout functionality
 * - Profile management
 * - Trophy system integration
 * - Session security
 */
class AuthController extends Controller
{
    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View Returns the registration form view
     */
    public function showRegistrationForm()
    {
        return view('create-acc');
    }

    /**
     * Handle the registration request.
     *
     * Processes new user registration including:
     * - Input validation
     * - Avatar upload handling
     * - User creation in database
     * - Password hashing
     *
     * @param Request $request Contains all registration form data
     * @return \Illuminate\Http\RedirectResponse Redirects to login page on success
     *
     * @throws \Illuminate\Validation\ValidationException When validation fails
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'regex:/[0-9]/', 'regex:/[A-Z]/', 'confirmed'],
            'description' => ['nullable', 'string', 'max:1000'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'terms' => ['required', 'accepted'],
        ]);

        $avatarUrl = null;
        if ($request->hasFile('avatar')) {
            $avatarUrl = $request->file('avatar')->store('avatars', 'public');
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'avatarurl' => $avatarUrl,
        ]);

        return redirect()->route('login')
            ->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }

    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View Returns the login form view
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Authenticate user login attempt.
     *
     * Validates credentials and manages user session:
     * - Validates email and password
     * - Creates new session on successful login
     * - Handles failed login attempts
     *
     * @param Request $request Contains login credentials
     * @return \Illuminate\Http\RedirectResponse Redirects to home or back with errors
     *
     * @throws \Illuminate\Validation\ValidationException When validation fails
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }

    /**
     * Display user profile with trophies.
     *
     * Retrieves and displays:
     * - User's personal information
     * - User's earned trophies
     * - Trophy details including earn dates
     *
     * @return \Illuminate\View\View Returns profile view with user and trophy data
     */
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
            'trophies' => $userTrophies
        ]);
    }

    /**
     * Handle user logout.
     *
     * Performs secure logout by:
     * - Logging out the user
     * - Invalidating the session
     * - Regenerating CSRF token
     *
     * @param Request $request Current request instance
     * @return \Illuminate\Http\RedirectResponse Redirects to home page
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
