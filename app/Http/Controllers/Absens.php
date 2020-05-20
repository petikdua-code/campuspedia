<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\User;
use Illuminate\Support\Facades\Session;


class Absens extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('id');
        $data = User::where('id', $id)->first();
        
        date_default_timezone_set('Asia/Jakarta');
        $absen = new Absen;
        $absen->nama = $data->nama;
        $absen->email = $data->email;
        $absen->job = '';
        $absen->masalah = '';
        $absen->start = time();
        $absen->finish = '';
        $absen->tgl = date('d-m-Y');
        $absen->durasi = '';
        $absen->save();

        return redirect('/')->with('success', 'Absen berhasil, anda dapat melakukan Check Out sebelum pulang');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
  
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
