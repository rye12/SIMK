<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use DB;
use Auth;

class ServisController extends Controller
{
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('servis as s')
        ->leftjoin('pegawai as p', 's.id_pegawai', 'p.id')
        ->leftjoin('kendaraan as k', 's.id_kendaraan', 'k.id')
        ->select("s.*","k.nama as kendaraan","p.nama as pemilik")
        ->get();
        

        return view('servis.index', compact('data'));
    }

    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        // $sekarang = DB::table('barang_kategori')->where('id', $request->servis_sekarang)->first();
        // $selanjutnya = DB::table('barang_kategori')->where('id', $request->servis_berikutnya)->first();
        $nama = [
            'nama'=> $request->nama
        ];
        $pegawai = DB::table('kendaraan_pegawai')->where('id_kendaraan', $request->id_kendaraan)->first();
        $servis = [
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $pegawai->id_pegawai,
            'kebutuhan_sekarang' => $request->servis_sekarang,
            'kebutuhan_selanjutnya' => $request->servis_berikutnya,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'kilometer' => $request->kilometer
        ];
        DB::table('servis')->insert($servis);
        $id_now = DB::table('servis')->latest('id')->first();
        $now = [
            'id_barang' => $request->servis_sekarang,
            'id_servis' => $id_now->id
        ];
        DB::table('servis_sekarang')->insert($now);
        $next = [
            'id_barang' => $request->servis_berikutnya,
            'id_servis' => $id_now->id
        ];
        DB::table('servis_berikutnya')->insert($next);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $barang = DB::table('barang')->get();
        return view('servis.create', compact('barang'));
    }

    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $barang = DB::table('barang')->get();
        $servis = DB::table("servis")->where('id',$id)->first();
        $now = DB::table('servis_sekarang')->first();
        $next = DB::table('servis_berikutnya')->get();
        $nama = DB::table("users")->get();
        return view('servis.edit', compact('servis','nama','barang', 'now', 'next'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $sekarang = DB::table('barang_kategori')->where('id', $request->kebutuhan_sekarang)->first();
        $selanjutnya = DB::table('barang_kategori')->where('id', $request->kebutuhan_selanjutnya)->first();
        $nama = [
            'nama'=> $request->nama
        ];
        $servis = [
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'kebutuhan_sekarang' => $sekarang->nama,
            'kebutuhan_selanjutnya' => $selanjutnya->nama,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ];
        DB::table('servis')->update($servis);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function destroy(Servis $servis, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $servis = DB::table('servis')->where('id', $id);
        $servis->delete();

        return redirect()->route('servis.index')
            ->with('success','Post deleted successfully');
    }


    public function lihat($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $foto = DB::table('servis_foto')->where('id_servis', $id)->get();
        return view('servis.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $file = $request->file('foto');
        $tujuan_upload = 'files/servis/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);

        DB::table('servis_foto')->insert(['file' => $nama, 'id_servis' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }
}