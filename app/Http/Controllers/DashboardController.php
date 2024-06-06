<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Login;
use App\Models\Wisata;
use App\Models\Reservasi;

class DashboardController extends Controller
{
    public function sum_total() {
        $reservasi = Reservasi::with(['reservasi_detail' => fn ($q) => $q->with('wisata')])->get();
        
        $result = [
            "total" => 0,
            "success" => 0,
            "pending" => 0,
        ];

        foreach ($reservasi as $r) {
            $total = 0; 
            foreach ($r->reservasi_detail as $rd) {
                $total += $rd->wisata->tarif_parkir + ($r->tarif_masuk == 'ya') ? $rd->wisata->tarif_masuk_wisata : 0;
            }
            $total += $r->bus->harga_sewa + ($r->harga_makan * $r->jumlah_makan * $r->jumlah_penumpang);

            if ($r->status_reservasi_kode == '1') $result['success'] += $total;
            else $result['pending'] += $total;

            $result['total'] += $total;
        }

        return $result;
    }

    public function index() {
        $data = [
            'title' => "Overview - Dashboard",
            'background' => '/storage/img/bg/image-login-page.jpg',
            'count_bus' => Bus::count(),
            'count_user' => Login::count(),
            'count_wisata' => Wisata::count(),
            'pendapatan' => $this->sum_total(),
            'reservasi' => Reservasi::with(['reservasi_detail' => fn ($q) => $q->with('wisata')])->get(),
        ];
        
        return view('dashboard.index', $data);
    }
    
    public function transaction() {
        $data = [
            'title' => "Detail Transaksi - Dashboard",
            'pendapatan' => $this->sum_total(),
            'reservasi' => Reservasi::with(['reservasi_detail' => fn ($q) => $q->with('wisata'), 'login' => fn ($q) => $q->with('pelanggan'), 'kota'])->paginate(3),
        ];
        
        return view('dashboard.transaction.index', $data);
    }
    
    public function show($status) {

        if ($status == "success") $reservasi = Reservasi::with(['reservasi_detail' => fn ($q) => $q->with('wisata'), 'login' => fn ($q) => $q->with('pelanggan'), 'kota'])->where('status_reservasi_kode', '1')->paginate(3);
        else $reservasi = Reservasi::with(['reservasi_detail' => fn ($q) => $q->with('wisata'), 'login' => fn ($q) => $q->with('pelanggan'), 'kota'])->where('status_reservasi_kode', '2')->orWhere('status_reservasi_kode', '3')->paginate(3);

        $data = [
            'title' => $status == 'success' ? "Sudah Dibayar - Dashboard" : "Belum Dibayar - Dashboard",
            'pendapatan' => $this->sum_total(),
            'reservasi' => $reservasi,
        ];

        return view('dashboard.transaction.show', $data);
    }
}
