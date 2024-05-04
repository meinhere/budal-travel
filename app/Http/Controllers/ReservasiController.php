<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index() {
        $data = [
            'title' => "Halaman Home",
        ];
        return view('home', $data);
    }

    public function search(Request $request) {
        $data = [
            'title' => "Halaman Search",
            'kota' => $request->kota,
            // 'wisata' => Wisata::find('kota_id', $request->kota)
        ];
        return view('search', $data);
    }
}
