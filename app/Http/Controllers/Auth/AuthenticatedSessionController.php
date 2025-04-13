<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        // Cek role user dan arahkan ke dashboard masing-masing
        if ($user->hasRole('Admin')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('Petugas')) {
            return redirect()->route('userdashboard');
        }

        // Jika tidak ada role, redirect ke login
        Auth::logout();
        return redirect()->route('login')->withErrors(['role' => 'Akun Anda belum memiliki role yang sesuai.']);
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
