<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use DB;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kendaraan as a')
            ->leftjoin('kendaraan_jenis as b', 'a.id_jenis', 'b.id')
            ->select("a.*", "b.nama as jenis")
            ->get();
        //$data = Kendaraan::with('user')->get();

        return view('kendaraan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'id_jenis' => 'required',
            'no_rangka' => 'required',
            'no_plat' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',

            // 'jenis' => 'required',
            // 'warna' => 'required',
            // 'no_mesin' => 'required',
            // 'nama' => 'required',
            // 'plat' => 'required',
            // 'password' => 'required',

        ]);

        $kendaraan = [
            'nama' => $request->nama,
            'id_jenis' => $request->id_jenis,
            'no_rangka' => $request->no_rangka,
            'no_plat' => $request->no_plat,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
            // 'jenis' => $request->jenis,
            // 'warna' => $request->warna,
            // 'mesin' => $request->mesin,
            // 'nama' => $request->nama,
            // 'plat' => $request->plat,
        ];
        DB::table('kendaraan')->insert($kendaraan);
        // dd($kendaraan);
        return redirect()->back()->with('success', 'Post updated successfully');
    }


    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = DB::table("kendaraan")->where('id', $id)->first();
        $jenis = DB::table("kendaraan_jenis")->get();
        return view('kendaraan.edit', compact('kendaraan', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($kendaraan);
        $data = $request->validate([
            'nama' => 'required',
            'id_jenis' => 'required',
            'no_rangka' => 'required',
            'no_plat' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            // 'jenis' => 'required',
            // 'warna' => 'required',
            // 'mesin' => 'required',
            // 'nama' => 'required',
            // 'plat' => 'required',
            // 'pemilik'=>'required',
            // 'password' => 'required',

        ]);

        $kendaraan = DB::table("kendaraan")->where('id', $id)->update([
            'nama' => $request->nama,
            'id_jenis' => $request->id_jenis,
            'no_rangka' => $request->no_rangka,
            'no_plat' => $request->no_plat,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
            // 'jenis' => $request->jenis,
            // 'warna' => $request->warna,
            // 'mesin' => $request->mesin,
            // 'nama' => $request->nama,
            // 'plat' => $request->plat,
            // 'pemilik'=>$request->pemilik,
        ]);
        // dd($kendaraan);
        return redirect()->route('kendaraan.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
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
