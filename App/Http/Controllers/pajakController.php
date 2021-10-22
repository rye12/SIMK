<?php

namespace App\Http\Controllers;

use App\Models\Pajak;
use Illuminate\Http\Request;
use DB;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        
        $pegawai = DB::table('pegawai')->where('nip', $request->nip)->first();
        $id = $pegawai->id;
        $kendaraan = DB::table('kendaraan')->where('no_rangka', $request->no_rangka)->first();
        $noka = $kendaraan->id;

        $pajak = [
            'id_pegawai' => $id,
            'id_kendaraan' => $noka,
            'id_jenis' => $request->id_jenis,
            'nominal' => $request->nominal,
            'id_verifikasi' => '1'
        ];

        DB::table('pajak')->insert($pajak);
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
        $pajak = DB::table("pajak")->where('id', $id)->first();
        $pegawai = DB::table("pegawai")->where('id', $id)->first();
        $kendaraan = DB::table("kendaraan")->where('id', $id)->get();
        $pajak_jenis = DB::table("pajak_jenis")->get();
        $verifikasi = DB::table("verifikasi")->get();
        return view('pajak.edit', compact('pajak', 'pegawai','kendaraan','pajak_jenis','verifikasi'));
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

        $pajak = [
            'id_pegawai' => $request->id_pegawai,
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
        $pajak = DB::table("pajak")->where('id', $id)->delete();

        return redirect()->route('pajak.index')
            ->with('success', 'Post deleted successfully');
    }
}
