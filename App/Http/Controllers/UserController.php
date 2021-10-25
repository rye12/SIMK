<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')->get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $data['password'] = bcrypt($request->password);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        User::create($data);

        /// redirect jika sukses menyimpan data
        return redirect()->route('users.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = [
            'name' => $request->nama,
            'username' => $request->id_jenis,
            'email' => $request->no_rangka,
            'password' => $request->no_plat,
        ];
        DB::table('kendaraan')->insert($user);


        // $data = $request->validate([
        //     'name' => 'required',
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // /// mengubah data berdasarkan request dan parameter yang dikirimkan
        // // $user->update($request->all());
        // if ($request->password == null || $request->password == '') {
        //     $payload = User::where('id', $user->id)->first();
        //     $user = User::where('id', $user->id)->update([
        //         $data,
        //         $data['password'] => $payload->password
        //     ]);
        // }


        // /// setelah berhasil mengubah data
        // if ($request->password != null) {
        //     $user = User::where('id', $user->id)->update([
        //         $data,
        //         $data['password'] => bcrypt($request->password),
        //     ]);
        // }
        // return redirect()->route('users.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Post deleted successfully');
    }
}
