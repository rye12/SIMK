<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Dashboard extends Controller
{
    public function index() 
    {
        $jmlPegawai = collect(DB::SELECT("SELECT count(id) as jmlPegawai"))->first();
    }
}
