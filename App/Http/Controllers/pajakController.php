<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use Illuminate\Http\Request;
use DB;
use Auth;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('pajak as a')
            ->leftjoin('pegawai as b', 'a.id_pegawai', 'b.id')
            ->leftjoin('kendaraan as c', 'a.id_kendaraan', 'c.id')
            ->leftjoin('pajak_jenis as d', 'a.id_jenis', 'd.id')
            ->leftjoin('verifikasi as e', 'a.id_verifikasi', 'e.id')
            ->select("a.*", "b.nama as pegawai", "c.nama as kendaraan", "d.nama as jenis_pajak", "e.nama as status")
            ->get();
        //$data = Kendaraan::with('user')->get();

        return view('pajak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        return view('pajak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }

        $kendaraan = DB::table('kendaraan_pegawai')->where('id_kendaraan', $request->id_kendaraan)->first();
        $jenisPajak = $request->id_jenis;
        $pajak = [
            'id_pegawai' => $kendaraan->id_pegawai,
            'id_kendaraan' => $kendaraan->id_kendaraan,
            'id_jenis' => $request->id_jenis,
            'nominal' => $request->nominal,
            'id_verifikasi' => '1'
        ];
        DB::table('pajak')->insert($pajak);

        if($request->id_jenis == 2){
            $kend = DB::table('kendaraan')->where('id', $request->id_kendaraan)->first();
            $hist = [
                'id_kendaraan' => $kendaraan->id_kendaraan,
                'plat_lama' => $kend->no_plat,
            ];
            DB::table('history_plat')->insert($hist);
        }

        return redirect()->route('pajak.index')->with('success', 'Post updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pajak = DB::table("pajak")->where('id', $id)->first();
        $pegawai = DB::table("pegawai")->where('id', $id)->first();
        $kendaraan = DB::table("kendaraan")->where('id', $id)->get();
        $pajak_jenis = DB::table("pajak_jenis")->get();
        $verifikasi = DB::table("verifikasi")->get();
        return view('pajak.edit', compact('pajak', 'pegawai', 'kendaraan', 'pajak_jenis', 'verifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pajak = [
            'id_kendaraan' => $request->id_kendaraan,
            'id_jenis' => $request->id_jenis,
            'nominal' => $request->nominal,
            'id_verifikasi' => $request->id_verifikasi
        ];

        DB::table('pajak')->where('id', $id)->update($pajak);
        return redirect()->route('pajak.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pajak = DB::table("pajak")->where('id', $id)->delete();

        return redirect()->route('pajak.index')
            ->with('success', 'Post deleted successfully');
    }

    public function lihat($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $foto = DB::table('pajak_foto')->where('id_pajak', $id)->get();
        return view('pajak.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $file = $request->file('foto');
        $tujuan_upload = 'files/pajak/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);
        DB::table('pajak_foto')->insert(['file' => $nama, 'id_pajak' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }

    public function updateSelesai($id)
    {
        DB::table('pajak')->where('id', $id)->update(['id_verifikasi' => '7']);
        return redirect()->route('pajak.index')->with('success', 'Post updated successfully');
    }
}
