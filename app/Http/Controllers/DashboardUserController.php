<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Login;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => "Kelola Users - Dashboard",
            'background' => '/storage/img/bg/image-login-page.jpg',
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
            'background' => '/storage/img/bg/image-login-page.jpg',
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
        // return $request;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {

        $user = Pelanggan::with('login')->where('login_id', $login->id_login)->first() ?? Karyawan::with('login')->where('login_id', $login->id_login)->first();

        $data = [
            'title' => "Edit User - Dashboard",
            'background' => '/storage/img/bg/image-login-page.jpg',
            'role' => Role::all()->toJson(),
            'jenis_kelamin' => JenisKelamin::all(),
            'user' => $user
        ];
        
        return view('dashboard.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
