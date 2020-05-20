<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Absen;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Collection;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users_absen = Absen::all();
        return view("/admin/index", ['users_absen' => $users_absen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("/admin/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return dd("hallo");
        date_default_timezone_set('Asia/Jakarta');

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'divisi' => 'required',
            'telp' => 'required',
            'password' => 'required',
            'admin' => 'required'
        ]); 

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->divisi = $request->divisi;
        $user->telp = $request->telp;
        $user->password = $request->password;
        $user->admin = $request->admin;

        $user->save();

        $users_absen = Absen::all();
        // Session::put('success', 'Data karyawan berhasil ditambahkan');
        return view('/admin/index', ['users_absen' => $users_absen]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $users = DB::table('users')->get();
        // return dd($users->nama);
        return view('admin/users', ['users'=> $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        // return dd($user->nama);
        return view('admin/user_table', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query1 = DB::table('users')->where('id', $id)->first();
        $email = $query1->email;

        $query2 = DB::table('absens')->where('email', $email)->delete();
        $query3 = DB::table('users')->where('id', $id)->delete();

        $users = DB::table('users')->get();
        // Session::put('success', 'Data berhasil dihapus');
        return view("/admin/users", ['users' => $users]);
    }

    public function destroy_absen($id)
    {
        //
        // return dd($id);
        $query = DB::table('absens')->where('id', $id)->delete();
        $users_absen = DB::table('absens')->get();
        // Session::put('success', 'Data berhasil dihapus');
        return view("/admin/index", ['users_absen' => $users_absen]);
    }
}
