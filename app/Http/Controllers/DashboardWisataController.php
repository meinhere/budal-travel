<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class DashboardWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => "Kelola Wisata - Dashboard",
            'background' => '/storage/img/bg/image-login-page.jpg',
            'wisata' => Wisata::with(['kota'])->paginate(10),
            'count' => Wisata::count()
        ];
        
        return view('dashboard.wisata.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisata $wisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {
        //
    }
}
