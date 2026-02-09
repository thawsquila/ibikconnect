<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        \Log::debug('Login request received', [
            'email' => $request->email,
            'has_password' => $request->filled('password'),
            'ip' => $request->ip()
        ]);

        try {
            $credentials = $request->validate([
                'email' => ['required','email'],
                'password' => ['required','string'],
                'remember' => ['nullable']
            ]);
            \Log::debug('Validation passed');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::warning('Validation failed', $e->errors());
            throw $e;
        }

        $remember = $request->boolean('remember');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();
            
            // Log successful login
            \Log::info('Login successful for: ' . $credentials['email']);
            
            // Redirect based on user role
            $redirect = $this->redirectToDashboard();
            \Log::info('Redirecting to: ' . $redirect->getTargetUrl());
            
            return $redirect;
        }

        \Log::warning('Login failed for: ' . $credentials['email']);
        return back()->withErrors(['email' => 'Email atau password tidak sesuai'])->onlyInput('email');
    }

    /**
     * Redirect user to appropriate dashboard based on role
     */
    protected function redirectToDashboard()
    {
        $user = Auth::user();

        if ($user->isCdcAdmin()) {
            return redirect()->route('admin.cdc.dashboard');
        }

        if ($user->isBeiAdmin()) {
            return redirect()->route('admin.bei.dashboard');
        }

        // Default fallback
        return redirect()->route('admin.cdc.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
