<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;

class Absens extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $absens = Absen::all();
        // Absen::create([
        //     'id' => '',
        //     'nama' => Session('nama'),
        //     'job' => '-',
        //     'masalah' => '-',
        //     'start' => time(),
        //     'finish' => '-',
        //     'tgl' => '-'
        // ]);

        $absen = new Absen;
        $absen->nama = Session('nama');
        $absen->job = '1';
        $absen->masalah = '1';
        $absen->start = '1';
        $absen->finish = '1';
        $absen->tgl = '1';
        $absen->save();
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
