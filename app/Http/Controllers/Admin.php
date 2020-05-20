<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Absen;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


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
        return view("/admin/index");
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

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->divisi = $request->divisi;
        $user->telp = $request->telp;
        $user->password = $request->password;
        $user->admin = $request->admin;

        $user->save();

        $users_absen = Absen::all();
        return view('/admin/index', ['users_absen' => $users_absen])->with('status', 'Data sipp absen joss');
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
        //
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
    }
}
