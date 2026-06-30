<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi user
        $request->authenticate();

        // Regenerasi session
        $request->session()->regenerate();

        // Ambil user yang login
        $user = Auth::user();

        // Jika Admin
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // Jika Customer
        if ($user->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        // Jika role tidak dikenali
        Auth::logout();

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Role akun tidak valid.',
            ]);
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}