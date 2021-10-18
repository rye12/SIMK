<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
use Hash;

class BarangController extends Controller
{

    public function index()
    {
        $data = DB::table('barang')->get();
        
        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
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
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required', 
        ]);
        
        $barang = [
            'kode' => $request->kode,
            'nama'=> $request->nama,
            'deskripsi'=> $request->deskripsi,
        ];

        DB::table('barang')->insert($barang);

        return redirect()->route('barang.index')->with('success','Post updated successfully');
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
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required', 
        ]);
        
        $kendaraan = Barang::where('id', $barang->id)->update([
            'kode' => $request->kode,
            'nama'=> $request->nama,
            'deskripsi'=> $request->deskripsi,
        ]);
        // dd($kendaraan);
        return redirect()->route('barang.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = DB::table("barang") ->where('id',$id)->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Post deleted successfully');
    }
}
