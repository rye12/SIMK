<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use DB;

class ServisController extends Controller
{
    public function index()
    {

        $data = DB::table('servis as s')
        ->leftjoin('users as t', 's.id_pegawai', 't.id')
        ->select("s.*","t.name as nama")
        ->get();
        

        return view('servis.index', compact('data'));
    }

    public function store(Request $request)
    {
        $nama = [
            'nama'=> $request->nama
        ];
        $servis = [
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'kebutuhan_sekarang' => $request->kebutuhan_sekarang,
            'kebutuhan_selanjutnya' => $request->kebutuhan_selanjutnya,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ];
        DB::table('servis')->insert($servis);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function create()
    {
        return view('servis.create');
    }

    public function edit($id)
    {
        $servis = DB::table("servis")->where('id',$id)->first();
        $nama = DB::table("users")->get();
        return view('servis.edit', compact('servis','nama'));
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
        $servis = DB::table('servis')->where('id',$id)->update([
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'kebutuhan_sekarang' => $request->kebutuhan_sekarang,
            'kebutuhan_selanjutnya' => $request->kebutuhan_selanjutnya,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('servis.index')->with('success', 'Post update successfully');
    }

    public function destroy(Servis $servis, $id)
    {
        $servis = DB::table('servis')->where('id', $id);
        $servis->delete();

        return redirect()->route('servis.index')
            ->with('success','Post deleted successfully');
    }


    public function lihat($id)
    {
        $foto = DB::table('servis_foto')->where('id_servis', $id)->get();
        return view('servis.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        $file = $request->file('foto');
        $tujuan_upload = 'files/servis/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);
        DB::table('servis_foto')->insert(['file' => $nama, 'id_servis' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }
}