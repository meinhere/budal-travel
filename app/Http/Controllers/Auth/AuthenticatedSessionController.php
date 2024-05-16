<?php

namespace App\Http\Controllers\Auth;

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
        $user = Pelanggan::where('login_id', auth()->user()->id_login)->first();
        $request->session()->put('user', $user);

        return redirect()->intended(route('home', absolute: false));
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
