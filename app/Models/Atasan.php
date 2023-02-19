<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Atasan extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function atasan()
    {
        return $this->hasMany(Atasan::class, 'atasan_id', 'id');
    }
}
