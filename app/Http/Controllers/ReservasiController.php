<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Bus;
use App\Models\Kota;
use App\Models\Pelanggan;
use App\Models\Wisata;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }

    public function store(Request $request){
        $order = Reservasi::create([
            'login_id' => $request->login_id,
            'bus_kode' => $request->bus_kode,
            'status_reservasi_kode' => '3',
            'kota_kode' => $request->kota_kode,
            'waktu_reservasi' => $request->waktu_reservasi,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'titik_awal' => $request->titik_awal,
            'jam_berangkat' => $request->jam_berangkat,
        ]);

        $user = Pelanggan::where('login_id', $request->login_id)->first();           

        $payload = [
            'transaction_details' => [
                'order_id'     => rand(),
                'gross_amount' => 1,
            ],
            'customer_details' => [
                'name'      => $user->nama_pelanggan,
                'phone'     => $user->no_telepon,
                'address'   => $user->alamat,
            ],
            'item_details' => [
                'bus_kode'          => $order->bus_kode,
                'kota_kode'         => $order->kota_kode,
                'waktu_reservasi'   => $order->waktu_reservasi,
                'jumlah_penumpang'  => $order->jumlah_penumpang,
                'titik_awal'        => $order->titik_awal,
                'jam_berangkat'     => $order->jam_berangkat,
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($payload);
        $order->snap_token = $snapToken;
        $order->save();
        return $snapToken;
    }

    public function index() {
        $data = [
            'title' => "Halaman Home",
            'background' => '/storage/img/bg/background-landing.jpg',
            'kota' => Kota::with('provinsi')->get(),
        ];
        return view('home', $data);
    }

    public function show(Kota $kota) {
        $data = [
            'title' => "Halaman Show",
            'background' => '/storage/img/bg/background-detail.jpg',
            'kota' => Kota::with('provinsi')->get(),
            'kode_kota' => $kota->kode_kota,
            'bus' => Bus::with([
                'status_bus',
                'kategori_bus',
                'reservasi'
            ])->get()
        ];
        return view('search', $data);
    }

    public function order(Kota $kota, Bus $bus) {
        
        $wisata = new stdClass();
        // Wisata::with('kota')->select('kode_wisata', 'nama_wisata')->where('kota_kode', $kota->kode_kota)->get()->map(fn($item) => $wisata->{$item->kode_wisata} = $item->nama_wisata);
        $wisata = Wisata::where('kota_kode', $kota->kode_kota)->get();
        $data = [
            'title' => "Halaman Order",
            'background' => '/storage/img/bg/background-detail.jpg',
            'wisata' => $wisata,
            'kota' => $kota,
            'bus' => $bus,
        ];
        
        // return($wisata);
        return view('order', $data);
    }
}