<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $data = [
            'title' => "Edit Profile",
            'background' => asset('storage/img/bg/background-landing.jpg'),
            'user' => $request->user(),
        ];

        return view('profile.edit', $data);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'nama_pelanggan' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'no_telepon' => ['required', 'phone:ID,BE'],
            'alamat' => ['required', 'string'],
        ];

        if ($request->password) $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];

        $request->validate($rules);

        if ($request->password) {
            Login::where('id_login', auth()->user()->id_login)->update([
                'password' => Hash::make($request->password),
            ]);
        }

        Pelanggan::where('login_id', auth()->user()->id_login)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        $pelanggan = Pelanggan::where('login_id', auth()->user()->id_login)->first();
        $request->session()->put('user', $pelanggan);

        return redirect(route('profile.edit'))->with('success', 'Profil berhasil diperbarui!');
    }

}
