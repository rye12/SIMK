<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kendaraan','id_pegawai','kebutuhan_sekarang','kebutuhan_selanjutnya','tanggal','keterangan'
    ];
    public function servis(){
        return $this->belongsTo(User::class);
    }
}
