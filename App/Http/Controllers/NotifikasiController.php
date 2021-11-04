<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        if(Auth::user()->level == 'admin'){
            $data = DB::table('notifikasi as a')
                ->leftjoin('pegawai as p', 'p.id', '=', 'a.id_pegawai')
                ->select('a.*', 'p.nama as nama','p.nip as nip')
                ->get();

            return view('notifikasi.indexAdmin', compact('data'));
        }else{
            $data = DB::table('notifikasi')->get();
            return view('notifikasi.index', compact('data'));
        }
    }

    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pegawai = DB::table('pegawai')->get();
        return view('notifikasi.create', compact('pegawai'));
    }

    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $notif = [
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
        ];
        DB::table('notifikasi')->insert($notif);
        return redirect()->back()->with('success', 'Post updated successfully');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $notif = DB::table('notifikasi')->where('id', $id)->first();
        $pegawai = DB::table('pegawai')->get();
        return view('notifikasi.edit', compact('notif', 'pegawai'));
    }


    public function update(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $notif = [
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
        ];
        DB::table('notifikasi')->where('id', $id)->update($notif);
        return redirect()->route('notifikasi.index')->with('success', 'Post updated successfully');
    }


    public function destroy($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $del = DB::table('notifikasi')->where('id', $id);
        $del->delete();

        return redirect()->route('notifikasi.index')
            ->with('success', 'Post deleted successfully');
    }
}
