<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use DB;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = DB::table('kendaraan as c')
            ->leftjoin('kendaraan_pegawai as d', 'd.id_kendaraan', '=', 'c.id')
            ->leftjoin('pegawai as e', 'e.id', '=', 'd.id_pegawai')
            ->leftjoin('kendaraan_jenis as b', 'c.id_jenis', 'b.id')
            ->select('c.*', 'e.nama as pemilik', 'b.nama as jenis')
            ->get();
        return view('kendaraan.index', compact('data'));
    }

    public function create()
    {

        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'id_jenis' => 'required',
            'no_rangka' => 'required',
            'no_plat' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',

        ]);
        $kendaraan = [
            'nama' => $request->nama,
            'id_jenis' => $request->id_jenis,
            'no_rangka' => $request->no_rangka,
            'no_plat' => $request->no_plat,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
        ];
        DB::table('kendaraan')->insert($kendaraan);
        return redirect()->back()->with('success', 'Post updated successfully');
    }


    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit($id)
    {
        $kendaraan = DB::table("kendaraan")->where('id', $id)->first();
        $jenis = DB::table("kendaraan_jenis")->get();
        return view('kendaraan.edit', compact('kendaraan', 'jenis'));
    }

    public function update(Request $request, $id)
    {

        DB::table("kendaraan")->where('id', $id)->update([
            'nama' => $request->nama,
            'id_jenis' => $request->id_jenis,
            'no_rangka' => $request->no_rangka,
            'no_plat' => $request->no_plat,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
        ]);
        return redirect()->route('kendaraan.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $del = DB::table('kendaraan')->where('id', $id);
        $del->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Post deleted successfully');
    }
    public function lihat($id)
    {
        $foto = DB::table('kendaraan_foto')->where('id_kendaraan', $id)->get();
        return view('kendaraan.foto', compact('id', 'foto'));
    }
    public function fotoupload(Request $request, $id)
    {
        $file = $request->file('foto');
        $tujuan_upload = 'files/kendaraan/';

        // upload file
        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);
        DB::table('kendaraan_foto')->insert(['file' => $nama, 'id_kendaraan' => $id]);
        return back();
    }
}
