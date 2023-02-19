<?php

namespace App\Http\Controllers;
use App\Models\Atasan;
use App\Models\Pesanan;
use App\Models\Kendaraan;

use Illuminate\Http\Request;

class AtasanController extends Controller
{
    public function index()
    {
        $Pesanan = Pesanan::latest()->get();
        $kendaraan = Kendaraan::latest()->get();
        $atasan = Atasan::latest()->get();
        return view('Atasan.pesanan.index', [
            'pesanans' => $Pesanan,
            'kendaraans' => $kendaraan,
            'atasans' => $atasan
        ]);
    }

    public function izin(Request $request, Pesanan $Pesanan)
    {
        $values = [
            'izin' => $request->izin
        ];
    
        Pesanan::where('id', $Pesanan->id)->update($values);

        return redirect('/atasan');
    }
}
