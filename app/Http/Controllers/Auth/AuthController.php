<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // ── Show login form ──────────────────────────────────────────
    public function showLogin()
    {
        if (Auth::check()) {
            return Auth::user()->is_admin
                ? redirect('/admin')
                : redirect('/');
        }
        return view('auth.login');
    }

    // ── Handle login ─────────────────────────────────────────────
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin')
                    ->with('status', 'Welcome back, ' . Auth::user()->name . '!');
            }

            return redirect()->intended('/')
                ->with('status', 'Welcome back, ' . Auth::user()->name . '!');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('error', 'These credentials do not match our records.');
    }

    // ── Show register form ────────────────────────────────────────
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }

    // ── Handle registration ───────────────────────────────────────
    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms'    => ['accepted'],
        ], [
            'terms.accepted' => 'You must accept the Terms of Service.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/')
            ->with('status', 'Account created! Welcome to HimalayaAI, ' . $user->name . '!');
    }

    // ── Logout ────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login')
            ->with('status', 'You have been signed out successfully.');
    }
}
