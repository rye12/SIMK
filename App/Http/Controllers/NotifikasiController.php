<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NotifikasiController extends Controller
{
    public function index()
    {
        $data = DB::table('notifikasi as a')->get();

        return view('notifikasi.index', compact('data'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
