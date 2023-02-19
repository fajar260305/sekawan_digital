<?php

namespace App\Http\Controllers;

use App\Models\Atasan;
use App\Models\Pesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::latest()->get();
        $kendaraan = Kendaraan::latest()->get();
        $atasan = Atasan::latest()->get();
        return view('/dashboard/pesanan/index', [
            'pesanans' => $pesanan,
            'kendaraans' => $kendaraan,
            'atasans' => $atasan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate($this->validation());

        Pesanan::create($validator);

        return redirect('/dashboard/pesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        $kendaraan = Kendaraan::latest()->get();
        $atasan = Atasan::latest()->get();
        return view('/dashboard/pesanan/ubah', [
            'pesanans' => $pesanan,
            'kendaraans' => $kendaraan,
            'atasans' => $atasan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $validator = $request->validate($this->validation());

        Pesanan::where('id', $pesanan->id)->update($validator);

        return redirect('/dashboard/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        Pesanan::destroy($pesanan->id);
        return redirect('/dashboard/pesanan');
    }

    public function validation()
    {
        return [
            'mobil_id' => 'required',
            'driver' => 'required',
            'atasan_id' => 'required',
            'telp' => 'required',
            'plat_mobil' => 'required'
        ];
    }
}
