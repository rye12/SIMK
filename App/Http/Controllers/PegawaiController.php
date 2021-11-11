<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use DB;
use Hash;
use Auth;
use App\Models\User;
use Exception;

class PegawaiController extends Controller
{
    public function index()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('pegawai')->get();
        return view('pegawai.index', compact('data'));
    }

    public function kendaraan($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('kendaraan_pegawai as a')
            ->leftjoin('kendaraan as b', 'b.id', 'a.id_kendaraan')
            ->leftjoin('pegawai as c', 'c.id', 'a.id_pegawai')
            ->leftjoin('kendaraan_jenis as d', 'b.id_jenis', 'd.id')
            ->where('a.id_pegawai', $id)
            ->select('b.*', 'a.id as id_kendaraan_pegawai', 'd.nama as jenis', 'a.id as id_kendaraanPegawai', 'a.status')
            ->get();
        return view('pegawai.kendaraan', compact('data', 'id'));
    }

    public function kendaraanTambah($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $id = $id;
        $kendaraan = DB::table('kendaraan')->get();
        return view('pegawai.kendaraan-tambah', compact('id', 'kendaraan'));
    }
    public function kendaraanSimpan(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        DB::table('kendaraan_pegawai')->insert([
            'id_pegawai' => $request->id_pegawai,
            'id_kendaraan' => $request->id_kendaraan,
        ]);
        return back();
    }

    public function kendaraanHapus($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        DB::table('kendaraan_pegawai')->where('id', $id)->delete();
        return back();
    }
    public function kendaraanStatus($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $check = DB::table('kendaraan_pegawai')->where('id', $id)->first();
        $st = $check->status == 1 ? 0 : 1;
        DB::table('kendaraan_pegawai')->where('id', $id)->update(['status' => $st]);
    }
    public function kendaraanServis($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $data = DB::table('servis as a')
            ->leftjoin('kendaraans as b', 'b.id', 'a.id_kendaraan')
            ->leftjoin('users as c', 'c.id', 'a.id_pegawai')
            ->where('a.id_kendaraan', $id)
            ->get();
        return view('pegawai.kendaraan-servis', compact('data', 'id'));
    }
    public function exportWord($id)
    {
        $data = DB::table('pegawai as a')
            ->leftjoin('kendaraan_pegawai as b', 'b.id_pegawai', '=', 'a.id')
            ->where('b.id', $id)
            ->select('a.nama as nama')
            ->get();

        $word = new \PhpOffice\PhpWord\PhpWord();

        $section = $word->addSection();

        foreach ($data as $d) {
        $desc1 = "Nama : {$d->nama}"; }
        $desc2 = "Kendaraan :";

        $section->addText($desc1);
        $section->addText($desc2);

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($word, 'Word2007');
        try {
            $objectWriter->save(storage_path('formulirTTD.docx'));
        } catch (Exception $e) {
        }
        return response()->download(storage_path('formulirTTD.docx'));
    }

    // public function servisTambah($id)
    // {

    //     $val = DB::table('kendaraan_pegawai as a')
    //         ->leftjoin('kendaraans as b', 'b.id', 'a.id_kendaraan')
    //         ->where('a.id', $id)
    //         ->first();
    //     return view('pegawai.servis-tambah', compact('id', 'val'));
    // }

    // public function servisSimpan(Request $request, $id)
    // {
    //     DB::table('servis')->insert([
    //         'id_kendaraan' => $id,
    //         'id_pegawai' => $request->id_pegawai,
    //         'kebutuhan_sekarang' => $request->kebutuhan_sekarang,
    //         'kebutuhan_selanjutnya' => $request->kebutuhan_selanjutnya,
    //         'tanggal' => $request->tanggal,
    //         'keterangan' => $request->keterangan
    //     ]);

    //     return back();
    // }


    public function create()
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $jabatan = DB::table('jabatan')->get();
        return view('pegawai.create', compact('jabatan'));
    }


    public function edit($id)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pegawai = DB::table("pegawai")->where('id', $id)->first();
        $jabatan = DB::table('jabatan')->get();
        return view('pegawai.edit', compact('pegawai', 'jabatan'));
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

        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pegawai = DB::table('pegawai')->where('id', $id)->first();
        $pass = $pegawai->password;
        $data = [
            'username' => $request->username,
            'password' => $pass,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_jabatan' => $request->id_jabatan,
            'email' => $request->email,
        ];
        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }

        DB::table('pegawai')->where('id', $id)->update($data);
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
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $pegawai = DB::table("pegawai")->where('id', $id)->delete();

        return redirect()->route('pegawai.index')
            ->with('success', 'Post deleted successfully');
    }

    public function store(Request $request)
    {
        if (Auth::user() == '') {
            return view('auth.login');
            exit();
        }
        $file = $request->file('foto');
        $tujuan_upload = 'files/pegawai/';
        $nama = $file->getClientOriginalName();
        $file->move($tujuan_upload, $nama);

        $pegawai = [
            'username' => $request->username,
            'password' => $request->password,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_jabatan' => $request->id_jabatan,
            'email' => $request->email,
            'foto' => $nama,

        ];
        $pegawai['password'] = bcrypt($request->password);
        DB::table('pegawai')->insert($pegawai);
        $user = DB::table('pegawai')->where('nip', $request->nip)->first();

        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->nama,
            'email' => $request->email,
            'id_pegawai' => $user->id

        ];

        User::create($data);
        return redirect()->back()->with('success', 'Post updated successfully');
    }
}
