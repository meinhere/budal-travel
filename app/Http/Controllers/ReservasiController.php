<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Bus;
use App\Models\Kota;
use App\Models\Wisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use App\Models\ReservasiDetail;

class ReservasiController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
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
        $wisata = Wisata::where('kota_kode', $kota->kode_kota)->get();
        $data = [
            'title' => "Halaman Order",
            'background' => '/storage/img/bg/background-detail.jpg',
            'wisata' => $wisata,
            'kota' => $kota,
            'bus' => $bus,
        ];
        
        return view('order', $data);
    }

    public function store(Request $request) 
    {
        // Insert into table reservasi
        $order = Reservasi::create([
            'login_id'              => $request->login_id,
            'bus_kode'              => $request->bus_kode,
            'status_reservasi_kode' => '3',
            'kota_kode'             => $request->kota_kode,
            'waktu_reservasi'       => $request->waktu_reservasi,
            'jumlah_penumpang'      => $request->jumlah_penumpang,
            'titik_awal'            => $request->titik_awal,
            'jam_berangkat'         => $request->jam_berangkat,
        ]);

        // Insert into table reservasi_detail
        foreach ($request->wisata as $wisata) {
            ReservasiDetail::create([
                'reservasi_kode' => $order->kode_reservasi,
                'wisata_kode'   => $wisata,
                'waktu_wisata'  => now(),
            ]);
        }

        // Prepare data for midtrans
        $user = Pelanggan::where('login_id', $request->login_id)->first();           
        $params = array(
            'transaction_details'   => array(
                'order_id'          => rand(),
                'gross_amount'      => $request->total,
            ),
            'customer_details'  => array(
                'first_name'    => $user->nama_pelanggan,
                'phone'         => $user->no_telepon,
                "billing_address"   => array(
                    "first_name"    => $user->nama_pelanggan,
                    "phone"         => $user->no_telepon,
                    "address"       => $user->alamat,
                ),
            ),
            'item_details' => array(
                array (
                    'id'        => Reservasi::where('login_id', $request->login_id)->first()->kode_reservasi,
                    'name'      => 'Sewa Bus ' . $order->bus->nama_bus,
                    'quantity'  => 1,
                    'price'     => $request->total
                ),
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $order->snap_token = $snapToken;

        if ($request->has('makan')) {
            $order->jumlah_makan = $request->jumlah_makan;
            $order->harga_makan = $request->harga_makan;
        }

        if ($request->has('tarif_masuk')) {
            $order->tarif_masuk = 'ya';
        }

        
        $order->save();
        $data = [
            'snapToken' => $snapToken,
            'kode_reservasi' => $order->kode_reservasi,
        ];
        return $data;
    }

    public function paymentSuccess(Reservasi $reservasi) {
        $reservasi->update([
            'status_reservasi_kode' => '1',
            'waktu_bayar'           => now(),
            'metode_bayar'          => 'QRIS',
        ]);

        Bus::where('kode_bus', $reservasi->bus_kode)->update([
            'status_bus_kode' => '2',
        ]);
        
        return redirect(route('riwayat'))->with('success', 'Pembayaran berhasil');
    }

    public function paymentClosed(Reservasi $reservasi) {
        $reservasi->update([
            'status_reservasi_kode' => '3',
        ]);

        return redirect(route('riwayat'));
    }

    public function paymentFailed(Reservasi $reservasi) {
        $reservasi->update([
            'status_reservasi_kode' => '2',
        ]);

        Bus::where('kode_bus', $reservasi->bus_kode)->update([
            'status_bus_kode' => '1',
        ]);

        return redirect()->back()->with('error', 'Pembayaran gagal');
    }

}