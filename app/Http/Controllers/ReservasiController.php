<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index() {
        $data = [
            'title' => "Halaman Home",
            'background' => '/img/bg/background-landing.jpg',
        ];
        return view('home', $data);
    }
    
    public function search(Request $request) {
        $data = [
            'title' => "Halaman Search",
            'background' => '/img/bg/background-landing2.jpg',
        ];
        return view('search', $data);
    }

    public function order(Request $request) {
        $data = [
            'title' => "Halaman Order",
            'background' => '/img/bg/background-detail.jpg',
        ];
        return view('order', $data);
    }
}
