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
        
        $data = Kendaraan::with('user')->get();
        
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
         // dd($kendaraan);
        $data = $request->validate([
            'jenis' => 'required',
            'warna' => 'required',
            'mesin' => 'required', 
            'nama'=>'required',
            'plat'=>'required',
            // 'password' => 'required',

        ]);
        
        $kendaraan = Kendaraan::insert([
            'jenis' => $request->jenis,
            'warna'=> $request->warna,
            'mesin'=> $request->mesin,
            'nama'=>$request->nama,
            'plat'=>$request->plat,
        ]);
        // dd($kendaraan);
        return redirect()->back()->with('success','Post updated successfully');
    }

    
    public function show(Kendaraan $kendaraan)
    {
        //return view('kendaraan.show',compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        
        return view('kendaraan.edit',compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        // dd($kendaraan);
        $data = $request->validate([
            'jenis' => 'required',
            'warna' => 'required',
            'mesin' => 'required',
            'nama'=>'required',
            'plat'=>'required',
            // 'pemilik'=>'required',
            // 'password' => 'required',

        ]);
        
        $kendaraan = Kendaraan::where('id', $kendaraan->id)->update([
            'jenis' => $request->jenis,
            'warna'=> $request->warna,
            'mesin'=> $request->mesin,
            'nama'=>$request->nama,
            'plat'=>$request->plat,
            // 'pemilik'=>$request->pemilik,
        ]);
        // dd($kendaraan);
        return redirect()->route('kendaraan.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
  
        return redirect()->route('kendaraan.index')
                        ->with('success','Post deleted successfully');
    }
}
