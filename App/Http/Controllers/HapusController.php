<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HapusController extends Controller
{
   public function destroy(){
       $data = DB::table('users')->delete();
       return view('user1',compact('data'));
   }
}
