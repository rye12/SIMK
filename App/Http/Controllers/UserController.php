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


    public function show(User $user)
    {

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $pass = $user->password;
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => $pass,
        ];
        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);
        return redirect()->route('user.index')->with('success', 'Post updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Post deleted successfully');
    }
}
