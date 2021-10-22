<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai','id_kendaraan','id_jenis','nominal','verifikasi'
    ];
    public function barang(){
        return $this->belongsTo(User::class);
    }
    public function kategori(){
        return $this->hasMany(Kategori::class);
    }
}
