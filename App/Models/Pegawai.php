<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik','nama','alamat','no_hp'
    ];
    public function pegawai(){
        return $this->belongsTo(User::class);
    }

}
