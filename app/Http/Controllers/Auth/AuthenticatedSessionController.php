<?php

namespace App\Http\Controllers\Auth;

use App\Models\Karyawan;
use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data = [
            'title' => "Halaman Login",
            'background' => '/storage/img/bg/background-landing.jpg',
            'background_caption' => '/storage/img/bg/image-login-page.jpg',
        ];
        return view('auth.login', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $pelanggan = Pelanggan::where('login_id', auth()->user()->id_login)->first();
        $karyawan = Karyawan::with('role')->where('login_id', auth()->user()->id_login)->first();

        if ($pelanggan) {
            $request->session()->put('user', $pelanggan);
            return redirect()->intended(route('home'));
        } else {
            $request->session()->put('user', $karyawan);
            return redirect()->to(route('dashboard'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
