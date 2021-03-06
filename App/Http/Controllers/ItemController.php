<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use DB;
use Auth;

class ItemController extends Controller
{
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('pengajuan_barang as a')
            ->leftjoin('pegawai as b', 'b.id', 'a.id_pegawai')
            ->leftjoin('barang_kategori as c', 'c.id', 'a.id_barang')
            ->leftjoin('verifikasi_item as d', 'd.id', 'a.verifikasi')
            ->select('a.*', 'b.nama as nama', 'b.nip as nip', 'c.nama as barang', 'd.nama as verifikasi')
            ->get();
        return view('item.index', compact('data'));
    }

    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pegawai = DB::table('pegawai')->get();
        $barang = DB::table('barang')->get();
        return view('item.create', compact('pegawai', 'barang'));
    }

    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $status = DB::table('barang')->where('id', $request->id_barang)->first();
        if($status->jenis_kendaraan == $request->id_jenis){
            $item = [
                'id_pegawai' => $request->id_pegawai,
                'id_barang' => $request->id_barang,
                'keterangan' => $request->keterangan,
                'verifikasi' => 1,
            ];
            DB::table('pengajuan_barang')->insert($item);
            return redirect()->back()->with('success', 'Post updated successfully');
        }else{
            return back()->withErrors(['error' => ['Barang tidak bisa digunakan di kendaraan ini']]);
        }

        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $item = DB::table("pengajuan_barang")->where('id', $id)->first();
        $jenis = DB::table("barang_kategori")->get();
        $verifikasi = DB::table('verifikasi_item')->get();
        return view('item.edit', compact('item', 'jenis', 'verifikasi'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $item = DB::table('pengajuan_barang')->where('id', $id)->first();
        $data = [
            'id_pegawai' => $request->id_pegawai,
            'id_barang' => $request->id_barang,
            'keterangan' => $request->keterangan,
            'verifikasi' => $item->verifikasi,
        ];
        if (Auth::user() === 'admin') {
            $data['verifikasi'] = $request->verifikasi;
        }
        DB::table('pengajuan_barang')->where('id', $id)->update($data);
        return redirect()->route('item.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $del = DB::table('pengajuan_barang')->where('id', $id);
        $del->delete();

        return redirect()->route('item.index')
            ->with('success', 'Post deleted successfully');
    }

    public function lihat($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $foto = DB::table('pengajuan_barang_foto')->where('id_pengajuan_barang', $id)->get();
        return view('item.foto', compact('id','foto'));
    }

    public function fotoupload(Request $request, $id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $file = $request->file('foto');
        $tujuan_upload = 'files/item/';

        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);

        DB::table('pengajuan_barang_foto')->insert(['file' => $nama, 'id_pengajuan_barang' => $id, 'deskripsi' => $request->deskripsi]);
        return back();
    }
}
