<?php

namespace App\Http\Controllers\Auth;

use App\Models\Login;
use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data = [
            'title' => "Halaman Register",
            'background' => '/storage/img/bg/background-landing.jpg',
            'background_caption' => '/storage/img/bg/image-signup-page.jpg',
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
        // dd($request->all());
        $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:login'],
            'no_telepon' => ['required', 'phone:ID,BE'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string'],
        ]);

        Login::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Pelanggan::create([
            'login_id' => Login::max('id_login'),
            'jenis_kelamin_id' => $request->jenis_kelamin_id,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
            'alamat' => $request->alamat,
        ]);

        return redirect(route('login'))->with('success', 'Akun berhasil dibuat');
    }
}
