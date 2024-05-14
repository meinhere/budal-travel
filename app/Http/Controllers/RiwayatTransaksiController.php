<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ];

        return view('transaction.index', $data);
    }

    /**
     * Display the user's detail history transaction.
     */
    public function show($id)
    {
        $data = [
            'title' => "Detail Riwayat - $id",
            'background' => '/storage/img/bg/background-landing.jpg',
        ];

        return view('transaction.detail', $data);
    }
}
