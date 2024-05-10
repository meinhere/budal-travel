<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data = [
            'title' => "Halaman Login",
            'background' => '/img/bg/background-landing.jpg',
        ];
        return view('auth.register', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kelamin_id' => 'required|exists:jenis_kelamin,id',
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:pelanggan'],
            'no_hp' => ['required', 'phone:ID,BE'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => 'required',
        ]);

        $user = Pelanggan::create([
            'jenis_kelamin_id' => $request->jenis_kelamin_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
