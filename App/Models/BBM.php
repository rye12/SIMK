<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai','id_jenis','jumlah_liter','nominal'
    ];
    public function servis(){
        return $this->belongsTo(User::class);
    }
}
