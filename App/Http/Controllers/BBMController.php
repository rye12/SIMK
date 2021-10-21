<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use DB;

class BBMController extends Controller
{
    public function index()
    {

        $data = DB::table('bbm as b')
        ->leftjoin('users as t', 's.id_pegawai', 't.id')
        ->select("s.*","t.name as nama")
        ->get();
        

        return view('bbm.index', compact('data'));
    }

    public function store(Request $request)
    {
        $nama = [
            'nama'=> $request->nama
        ];
        $bbm = [
            'jumlah_liter' => $request->jumlah_liter,
            'nominal' => $request->nominal
        ];
        DB::table('bbm')->insert($bbm);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function create()
    {
        return view('bbm.create');
    }

    public function edit($id)
    {
        $servis = DB::table("bbm")->where('id',$id)->first();
        $nama = DB::table("users")->get();
        return view('bbm.edit', compact('bbm','nama'));
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
        $bbm = DB::table('bbm')->where('id',$id)->update([
            'jumlah_liter' => $request->jumlah_liter,
            'nominal' => $request->nominal
        ]);
        return redirect()->route('bbm.index')->with('success', 'Post update successfully');
    }

    public function destroy(BBM $bbm, $id)
    {
        $bbm = DB::table('bbm')->where('id', $id);
        $bbm->delete();

        return redirect()->route('bbm.index')
            ->with('success','Post deleted successfully');
    }


    public function lihat($id)
    {
        $foto = DB::table('bbm_foto')->where('id_bbm', $id)->get();
        return view('bbm.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        $file = $request->file('foto');
        $tujuan_upload = 'files/bbm/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);
        DB::table('bbm_foto')->insert(['file' => $nama, 'id_bbm' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }
}