<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
{
    public function index()
    {
        $data = DB::table('pengajuan_barang as a')
            ->leftjoin('pegawai as b', 'b.id', 'a.id_pegawai')
            ->leftjoin('barang_kategori as c', 'c.id', 'a.id_barang')
            ->leftjoin('verifikasi as d', 'd.id', 'a.verifikasi')
            ->select('a.*', 'b.nama as nama', 'c.nama as barang', 'd.nama as verifikasi')
            ->get();
        return view('item.index', compact('data'));
    }

    public function create()
    {
        $barang = DB::table('barang_kategori')->get();
        return view('item.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $pegawai = DB::table('pegawai')->where('nip', $request->nip)->first();
        $id_pegawai = $pegawai->id;

        $item = [
            'id_pegawai' => $id_pegawai,
            'id_barang' => $request->id_barang,
            'keterangan' => $request->keterangan,
            'verifikasi' => 1,
        ];
        DB::table('pengajuan_barang')->insert($item);
        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = DB::table("pengajuan_barang")->where('id', $id)->first();
        $jenis = DB::table("barang_kategori")->get();
        $verifikasi = DB::table('verifikasi')->get();
        return view('item.edit', compact('item', 'jenis', 'verifikasi'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = DB::table('pengajuan_barang')->where('id', $id)->update([
            'id_pegawai' => $request->nip,
            'id_barang' => $request->id_barang,
            'keterangan' => $request->keterangan,
            'verifikasi' => $request->verifikasi,
        ]);
        return redirect()->route('item.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $del = DB::table('pengajuan_barang')->where('id', $id);
        $del->delete();

        return redirect()->route('item.index')
            ->with('success', 'Post deleted successfully');
    }
}
