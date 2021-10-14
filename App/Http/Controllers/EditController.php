<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HapusController extends Controller
{
   public function edit(){
       $data = DB::table('Users')->find();
       return view('user1',compact('data'));
   }
}