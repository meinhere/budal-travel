<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => "Dashboard",
        ];
        
        return view('dashboard.index', $data);
    }

    public function transaction() {
        $data = [
            'title' => "Detail Transaksi",
        ];
        
        return view('dashboard.transaction', $data);
    }
}
