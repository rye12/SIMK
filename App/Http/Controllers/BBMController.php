<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use DB;
use Auth;

class BBMController extends Controller
{
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('bbm as b')
        ->leftjoin('kendaraan as k', 'b.id_kendaraan', 'k.id')
        ->leftjoin('pegawai as p', 'b.id_pegawai', 'p.id')
        ->leftjoin('bbm_jenis as j', 'b.id_jenis', 'j.id')
        ->select("b.*","k.nama as kendaraan","j.nama as jenis","p.nama as pemilik","p.nip as nip_pegawai")
        ->get();
        

        return view('bbm.index', compact('data'));
    }

    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $nama = [
            'nama'=> $request->nama
        ];
        $bbm = [
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'id_jenis' => $request->id_jenis,
            'jumlah_liter' => $request->jumlah_liter,
            'nominal' => $request->nominal
        ];
        DB::table('bbm')->insert($bbm);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        return view('bbm.create');
    }

    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $bbm= DB::table("bbm")->where('id',$id)->first();
        $jenis = DB::table("bbm_jenis")->get();
        return view('bbm.edit', compact('bbm','jenis'));
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
        $bbm = DB::table('bbm')->where('id',$id)->update([
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'id_jenis' => $request->id_jenis,
            'jumlah_liter' => $request->jumlah_liter,
            'nominal' => $request->nominal
        ]);
        return redirect()->route('bbm.index')->with('success', 'Post update successfully');
    }

    public function destroy($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $bbm = DB::table('bbm')->where('id', $id);
        $bbm->delete();

        return redirect()->route('bbm.index')
            ->with('success','Post deleted successfully');
    }


    public function lihat($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $foto = DB::table('bbm_foto')->where('id_bbm', $id)->get();
        return view('bbm.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $file = $request->file('foto');
        $tujuan_upload = 'files/bbm/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);
        DB::table('bbm_foto')->insert(['file' => $nama, 'id_bbm' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }
}