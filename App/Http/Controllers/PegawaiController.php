<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use DB;
use Hash;

class PegawaiController extends Controller
{
    public function index()
    {

        $data = DB::table('users')->where('level', 'user')->get();

        return view('pegawai.index', compact('data'));
    }

    public function kendaraan($id)
    {
        $data = DB::table('kendaraan_pegawai as a')
            ->leftjoin('kendaraans as b', 'b.id', 'a.id_kendaraan')
            ->leftjoin('users as c', 'c.id', 'a.id_pegawai')
            ->where('a.id_pegawai', $id)
            ->select('*', 'a.id as id_kendaraan_pegawai')
            ->get();
        return view('pegawai.kendaraan', compact('data', 'id'));
    }

    public function kendaraanTambah($id)
    {
        $id = $id;
        $kendaraan = DB::table('kendaraans')->get();
        return view('pegawai.kendaraan-tambah', compact('id', 'kendaraan'));
    }
    public function kendaraanSimpan(Request $request)
    {
        DB::table('kendaraan_pegawai')->insert([
            'id_pegawai' => $request->id_pegawai,
            'id_kendaraan' => $request->id_kendaraan,
        ]);
        return back();
    }

    public function kendaraanHapus($id)
    {
        DB::table('kendaraan_pegawai')->where('id', $id)->delete();
        return back();
    }

    public function kendaraanServis($id)
    {
        $data = DB::table('servis as a')
            ->leftjoin('kendaraans as b', 'b.id', 'a.id_kendaraan')
            ->leftjoin('users as c', 'c.id', 'a.id_pegawai')
            ->where('a.id_kendaraan', $id)
            ->get();
        return view('pegawai.kendaraan-servis', compact('data', 'id'));
    }

    public function servisTambah($id)
    {

        $val = DB::table('kendaraan_pegawai as a')
            ->leftjoin('kendaraans as b', 'b.id', 'a.id_kendaraan')
            ->where('a.id', $id)
            ->first();
        return view('pegawai.servis-tambah', compact('id', 'val'));
    }

    public function servisSimpan(Request $request, $id)
    {
        DB::table('servis')->insert([
            'id_kendaraan' => $id,
            'id_pegawai' => $request->id_pegawai,
            'kebutuhan_sekarang' => $request->kebutuhan_sekarang,
            'kebutuhan_selanjutnya' => $request->kebutuhan_selanjutnya,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return back();
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }


    public function edit($id)
    {
        $pegawai = DB::table("users") ->where('id',$id) ->first();
        return view('pegawai.edit', compact('pegawai'));
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

        $data = $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        // $user->update($request->all());
        $pegawai =  DB::table("users") ->where('id',$id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = DB::table("users") ->where('id',$id)->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Post deleted successfully');
    }

    public function store(Request $request)
    {
        

        $data = [
            'nip'=>$request->nip,
            'nama'=>$request->nama,
        ];

        DB::table('pegawai')->insert($data);

        $val = DB::table('pegawai')->where('nip',$request->nip)->first();

        $user = [
            'username'=>$request->nip,
            'name'=>$request->nama,
            'password'=>Hash::make($request->password),
            'id_pegawai'=>$val->id
        ];
        DB::table('users')->insert($user);

         
        /// redirect jika sukses menyimpan data
        return redirect()->route('users.index')
                        ->with('success','Post created successfully.');
    
    }
}
