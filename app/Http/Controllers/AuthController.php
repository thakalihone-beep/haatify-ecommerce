<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        return view('frontend.auth.login');
    }

    /**
     * Show registration page
     */
    public function showRegister()
    {
        return view('frontend.auth.signup');
    }

    /**
     * Login user
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            throw ValidationException::withMessages([
                'email' => 'The email or password is incorrect.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('home'))
            ->with('success', 'Welcome back!');
    }

    /**
     * Register new user
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'terms' => ['required', 'accepted'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Account created successfully. Welcome to Haatify!'
            );
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with(
                'success',
                'You have been logged out successfully.'
            );
    }

    /**
     * Redirect user to Google
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function callback(Request $request)
    {
        // Handle user denying Google access
        if ($request->has('error')) {
            return redirect()->route('login')
                ->with('error', 'Google sign-in was cancelled.');
        }

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google sign-in failed. Please try again.');
        }

        // Check if user already exists with Google ID
        $user = User::where('google_id', $googleUser->id)->first();

        if (!$user) {

            // Check if email already exists
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {

                // Connect Google account to existing user
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar'    => $googleUser->avatar,
                ]);

            } else {

                // Create new user (email already verified by Google)
                $user = User::create([
                    'name'              => $googleUser->name,
                    'email'             => $googleUser->email,
                    'google_id'         => $googleUser->id,
                    'avatar'            => $googleUser->avatar,
                    'password'          => Hash::make(uniqid()),
                    'email_verified_at' => now(),
                ]);
            }
        }

        // Login user
        Auth::login($user);

        // Regenerate session
        $request->session()->regenerate();

        // Redirect to home
        return redirect()
            ->route('home')
            ->with('success', 'Welcome to Haatify!');
    }
}
