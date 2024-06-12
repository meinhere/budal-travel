<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Login;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => "Kelola Users - Dashboard",
            'background' => asset('/storage/img/bg/image-login-page.jpg'),
            'users' => Login::with(['pelanggan', 'karyawan'])->paginate(10),
            'count' => Login::count(),
        ];
        
        return view('dashboard.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => "Tambah User - Dashboard",
            'background' => asset('/storage/img/bg/image-login-page.jpg'),
            'role' => Role::all()->toJson(),
            'jenis_kelamin' => JenisKelamin::all()
        ];
        
        return view('dashboard.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rule = [
            'nama_user' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:login'],
            'no_telepon' => ['required', 'phone:ID,BE'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        if ($request->has('alamat')) $rule['alamat'] = ['required', 'string'];

        $request->validate($rule);

        Login::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role_id == '0') {
            Pelanggan::create([
                'login_id' => Login::max('id_login'),
                'nama_pelanggan' => $request->nama_user,
                'no_telepon' => $request->no_telepon,
                'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
                'alamat' => $request->alamat,
            ]);
        } else {
            Karyawan::create([
                'login_id' => Login::max('id_login'),
                'role_id' => $request->role_id,
                'nama_karyawan' => $request->nama_user,
                'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
                'no_telepon' => $request->no_telepon,
            ]);
        } 

        return redirect(route('dashboard.user'))->with('success', 'User baru berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {

        $user = Pelanggan::with('login')->where('login_id', $login->id_login)->first() ?? Karyawan::with('login')->where('login_id', $login->id_login)->first();

        $data = [
            'title' => "Edit User - Dashboard",
            'background' => asset('/storage/img/bg/image-login-page.jpg'),
            'role' => Role::all()->toJson(),
            'jenis_kelamin' => JenisKelamin::all(),
            'user' => $user,
            'login' => $login
        ];
        
        return view('dashboard.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        $rule = [
            'nama_user' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'no_telepon' => ['required', 'phone:ID,BE'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        if ($request->has('alamat')) $rule['alamat'] = ['required', 'string'];

        $request->validate($rule);

        Login::where('id_login', $login->id_login)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role_id == 0) {
            Pelanggan::where('login_id', $login->id_login)->update([
                'nama_pelanggan' => $request->nama_user,
                'no_telepon' => $request->no_telepon,
                'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
                'alamat' => $request->alamat,
            ]);
        } else {
            Karyawan::where('login_id', $login->id_login)->update([
                'role_id' => $request->role_id,
                'nama_karyawan' => $request->nama_user,
                'jenis_kelamin_kode' => $request->jenis_kelamin_kode,
                'no_telepon' => $request->no_telepon,
            ]);
        } 

        return redirect(route('dashboard.user'))->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        $pelanggan = Pelanggan::where('login_id', $login->id_login)->first();
        $karyawan = Karyawan::where('login_id', $login->id_login)->first();

        if ($pelanggan) $pelanggan->delete();
        else $karyawan->delete();

        $login->delete();
        return redirect(route('dashboard.user'))->with('success', 'User berhasil dihapus');
    }
}
