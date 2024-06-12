<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display the user's history transaction.
     */
    public function create($id)
    {
        $data = [
            'title' => "Ulasan Transaksi" - $id,
            'background' => asset('/storage/img/bg/background-landing.jpg'),
        ];

        return view('feedback.create', $data);
    }

    /**
     * Display the user's detail history transaction.
     */
    public function store(Request $request)
    {
        Feedback::create([
            'reservasi_kode' => $request->reservasi_kode,
            'kategori_kode' => $request->kategori_kode,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
