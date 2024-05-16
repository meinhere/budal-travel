<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index() {
        $data = [
            'title' => "Halaman Home",
            'background' => '/storage/img/bg/background-landing.jpg',
        ];
        return view('home', $data);
    }
    
    public function search(Request $request) {
        $data = [
            'bus' => Bus::where('status_bus_kode', '1')->get(),
        ];
        return redirect()->route('show', $data);
    }

    public function show($kota) {
        $data = [
            'title' => "Halaman Show",
            'background' => '/storage/img/bg/background-detail.jpg',
            'bus' => Bus::where('status_bus_kode', '1')->get(),
        ];
        return view('search', $data);
    }

    public function order() {
        $data = [
            'title' => "Halaman Order",
            'background' => '/storage/img/bg/background-detail.jpg',
        ];
        return view('order', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);

        return redirect()->route('home')->with('success', 'Reservasi berhasil dibuat');
    }
}
