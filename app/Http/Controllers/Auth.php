<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Absen;
use Illuminate\Support\Facades\Session;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login/index');
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
        $email = $request->email;
        $password = $request->password;
        date_default_timezone_set('Asia/Jakarta');

        $data = User::where('email', $email)->first();
        if($data) {
            if($password == $data->password) {
                if($data->admin == 0){
                    $tgl = date('d-m-Y');
                    Session::put('nama',$data->nama);
                    Session::put('email',$data->email);
                    Session::put('id',$data->id);
                    Session::put('login',TRUE);
                    
                    $data_absen = Absen::where('email', $data->email)->latest()->first();
                    // return dd($data_absen->id);
                    if($data_absen){

                        if($data_absen->tgl == $tgl){

                            if($data_absen->finish != ""){
                                return redirect('/')->with('danger', 'Anda sudah melakukan Check Out hari ini, kembali lagi besuk !');
                            }
                            // wis absen
                            return redirect('/user/absen')->with('danger', 'Anda sudah absen hari ini');
                        } else {
                            // gung absen
                            return redirect('/user')->with('status', 'Data sipp joss');
                        }
                    } else {
                        return redirect('/user')->with('status', 'Data sipp joss');
                    }
                    
                } elseif($data->admin == 1) {
                    $users_absen = Absen::all();
                    return view("/admin/index", ['users_absen' => $users_absen]);
                }
            } else {
                return redirect("/")->with('danger', 'Email atau password salah!');
            }
        } else {
            return redirect("/")->with('danger', 'Email atau password salah!');
        }

       
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
