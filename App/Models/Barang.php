<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode','nama','deskripsi'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
