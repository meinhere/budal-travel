<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Login;
use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => "Overview - Dashboard",
            'background' => '/storage/img/bg/image-login-page.jpg',
            'count_bus' => Bus::count(),
            'count_user' => Login::count(),
            'count_wisata' => Wisata::count(),
        ];
        
        return view('dashboard.index', $data);
    }

    public function transaction() {
        $data = [
            'title' => "Detail Transaksi - Dashboard",
        ];
        
        return view('dashboard.transaction.index', $data);
    }
}
