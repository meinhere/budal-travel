<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\ReservasiDetail;

class RiwayatTransaksiController extends Controller
{
    /**
     * Display the user's history transaction.
     */
    public function index()
    {
        $data = [
            'title' => "Riwayat Transaksi",
            'background' => '/storage/img/bg/background-landing.jpg',
            'card_background' => '/storage/img/bg/background-landing2.jpg',
            'reservasi' => Reservasi::with(['reservasi_detail'])->where('login_id', auth()->user()->id_login)->paginate(3),
        ];

        return view('transaction.index', $data);
    }

    /**
     * Display the user's detail history transaction.
     */
    public function show(Reservasi $reservasi)
    {
        $data = [
            'title' => "Detail Riwayat Transaksi",
            'background' => '/storage/img/bg/background-landing.jpg',
            'reservasi' => $reservasi,
            'reservasi_detail' => ReservasiDetail::with(['wisata'])->where('reservasi_kode', $reservasi->kode_reservasi)->get(),
        ];

        return view('transaction.detail', $data);
    }
}
