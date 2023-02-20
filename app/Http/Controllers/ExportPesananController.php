<?php

namespace App\Http\Controllers;

use App\Exports\PesananExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class ExportPesananController extends Controller
{
    public function export() 
    {
        // return Excel::download(new PesananExport, 'pesanan'.Carbon::now()->timestamp.'.xlsx');
        return (new PesananExport)->download('pesanan'.Carbon::now()->timestamp.'.xlsx');
    }

}
