<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesananExport implements FromQuery, WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Pesanan::query(); 
    }

    /**
    * @var Invoice $invoice
    */
    public function map($pesanan): array
    {
        return [
            $pesanan->driver,
            $pesanan->telp,
            $pesanan->plat_mobil,
            $pesanan->izin,
            $pesanan->mobil->mobil,
            $pesanan->atasan->name,
        ];
    }
}
