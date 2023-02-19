<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mobil()
    {
        return $this->belongsTo(Kendaraan::class, 'mobil_id', 'id');
    }

    public function atasan()
    {
        return $this->belongsTo(Atasan::class, 'atasan_id', 'id');
    }
}
