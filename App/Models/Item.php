<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai', 'id_barang', 'verifikasi'
    ];
}
