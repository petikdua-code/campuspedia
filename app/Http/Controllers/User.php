<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user/index');
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
        $user = Absen::where('id', $id)->first();
        $email = $user->email;
        $user_detail = DB::table('users')->where('email', $email)->first();
        return view('user/detail', [
            'user' => $user,
            'user_detail' => $user_detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $user_absen)
    {
        //
        date_default_timezone_set('Asia/Jakarta');

        $email = Session::get('email');
        $user_absen = Absen::where('email', $email)->latest()->first();
        return view('user/absen', ['user_absen' => $user_absen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $user_absen)
    {
        $request->validate([
            'job' => 'required',
            'masalah' => 'required'
        ]); 

        date_default_timezone_set('Asia/Jakarta');
        
        $user_update = Absen::where('email', $user_absen->email)->latest()->first();
        $user_update_id = $user_update->id;

        $finish = time();
        $start = $user_absen->start;
        $start_date = date('d-m-Y', $start);
        $start_date_new = strtotime($start_date);

        // return dd($finish - $start);

        $time_brake1Start = $start_date_new + 43200;
        $time_brake1End = $start_date_new + 46800;

        // return dd($time_brake1Start);

        $time_brake2Start = $start_date_new + 57600;
        $time_brake2End = $start_date_new + 61200;

        $time_brake3Start = $start_date_new + 64800;
        $time_brake3End = $start_date_new + 68400;

        $end = $start_date_new + 86400;

        // if($start >= $start_date_new && $start < $time_brake1Start){
        //     // pagi
        //     if($finish >= $start_date_new && $start < $time_brake1Start){
        //         // pagi
        //         $durasi = $finish - $start;

        //     } elseif ($finish >= $time_brake1Start && $finish < $time_brake1End) {
        //         // istirahat 1
        //         $durasi = $time_brake1Start - $start;

        //     } elseif ($finish >= $time_brake1End && $finish < $time_brake2Start) {
        //         // siang
        //         $durasi = $finish - $start - 3600;

        //     } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
        //         // istirahat 2
        //         $durasi = $time_brake2Start - $start - 3600;

        //     } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
        //         // sore
        //         $durasi = $finish - $start - 7200;

        //     } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
        //         // istirahat 3
        //         $durasi = $time_brake3Start - $start - 7200;

        //     } elseif ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $start - 10800;
        //     }
            
        // } elseif ($start >= $time_brake1Start && $start < $time_brake1End) {
        //     // istirahat 1
        //     if ($finish >= $time_brake1End && $finish < $time_brake2Start) {
        //         // siang
        //         $durasi = $finish - $time_brake1End;

        //     } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
        //         // istirahat 2
        //         $durasi = $time_brake2Start - $time_brake1End;

        //     } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
        //         // sore
        //         $durasi = $finish - $time_brake1End - 3600;

        //     } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
        //         // istirahat 3
        //         $durasi = $time_brake3Start - $time_brake1End - 3600;

        //     } elseif ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $time_brake1End - 7200;
        //     }

        // } elseif ($start >= $time_brake1End && $start < $time_brake2Start) {
        //     // siang
        //     if ($finish >= $time_brake1End && $finish < $time_brake2Start) {
        //         // siang
        //         $durasi = $finish - $start;
        //     } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
        //         // istirahat 2
        //         $durasi = $time_brake2Start - $start;

        //     } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
        //         // sore
        //         $durasi = $finish - $start - 3600;

        //     } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
        //         // istirahat 3
        //         $durasi = $time_brake3Start - $start - 3600;

        //     } elseif ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $start - 7200;
        //     }

        // } elseif ($start >= $time_brake2Start && $start < $time_brake2End) {
        //     // istirahat 2         
        //      if ($finish >= $time_brake2End && $finish < $time_brake3Start) {
        //         // sore
        //         $durasi = $finish - $time_brake2End;

        //     } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
        //         // istirahat 3
        //         $durasi = $time_brake3Start - $time_brake2End;

        //     } elseif ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $time_brake2End - 3600;
        //     }

        // } elseif ($start >= $time_brake2End && $start < $time_brake3Start) {
        //     // sore
        //     if ($finish >= $time_brake2End && $finish < $time_brake3Start) {
        //         // sore
        //         $durasi = $finish - $start;

        //     } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
        //         // istirahat 3
        //         $durasi = $time_brake3Start - $start;

        //     } elseif ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $start - 3600;
        //     }
            
        // } elseif ($start >= $time_brake3Start && $start < $time_brake3End) {
        //     // istirahat 3
        //     if ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $time_brake3End;
        //     }

        // } elseif ($start >= $time_brake3End && $start < $end){
        //     // malam
        //     if ($finish >= $time_brake3End && $finish < $end){
        //         // malam
        //         $durasi = $finish - $start;
        //     }

        // }

        if($start >= $start_date_new && $start < $time_brake1Start){
            // pagi
            // return dd($finish);
            if($finish >= $start_date_new && $finish < $time_brake1Start){
                // pagi
                $durasi = $finish - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                // return dd($finish . $time_brake1Start);
                return redirect('/');

            } elseif ($finish >= $time_brake2Start && $finish < $time_brake1End) {
                // istirahat 1
                $durasi = $time_brake1Start - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake1End && $finish < $time_brake2Start) {
                // siang
                $durasi = $finish - $start - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
                // istirahat 2
                $durasi = $time_brake2Start - $start - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
                // sore
                $durasi = $finish - $start - 7200;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
                // istirahat 3
                $durasi = $time_brake3Start - $start - 7200;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $start - 10800;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }
            
        } elseif ($start >= $time_brake1Start && $start < $time_brake1End) {
            // istirahat 1
            if ($finish >= $time_brake1End && $finish < $time_brake2Start) {
                // siang
                $durasi = $finish - $time_brake1End;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
                // istirahat 2
                $durasi = $time_brake2Start - $time_brake1End;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
                // sore
                $durasi = $finish - $time_brake1End - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
                // istirahat 3
                $durasi = $time_brake3Start - $time_brake1End - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $time_brake1End - 7200;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }

        } elseif ($start >= $time_brake1End && $start < $time_brake2Start) {
            // siang
            if ($finish >= $time_brake1End && $finish < $time_brake2Start) {
                // siang
                $durasi = $finish - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2Start && $finish < $time_brake2End) {
                // istirahat 2
                $durasi = $time_brake2Start - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake2End && $finish < $time_brake3Start) {
                // sore
                $durasi = $finish - $start - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
                // istirahat 3
                $durasi = $time_brake3Start - $start - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $start - 7200;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }

        } elseif ($start >= $time_brake2Start && $start < $time_brake2End) {
            // istirahat 2         
             if ($finish >= $time_brake2End && $finish < $time_brake3Start) {
                // sore
                $durasi = $finish - $time_brake2End;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
                // istirahat 3
                $durasi = $time_brake3Start - $time_brake2End;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $time_brake2End - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }

        } elseif ($start >= $time_brake2End && $start < $time_brake3Start) {
            // sore
            if ($finish >= $time_brake2End && $finish < $time_brake3Start) {
                // sore
                $durasi = $finish - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3Start && $finish < $time_brake3End) {
                // istirahat 3
                $durasi = $time_brake3Start - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            } elseif ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $start - 3600;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }
            
        } elseif ($start >= $time_brake3Start && $start < $time_brake3End) {
            // istirahat 3
            if ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $time_brake3End;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }

        } elseif ($start >= $time_brake3End && $start < $end){
            // malam
            if ($finish >= $time_brake3End && $finish < $end){
                // malam
                $durasi = $finish - $start;
                Absen::where('id', $user_update_id)->update([
                    'job' => $request->job,
                    'masalah' => $request->masalah,
                    'finish' => time(),
                    'durasi' => $durasi
                ]);
                return redirect('/');
                
            }

        } else {
            return "waktu salah";
        }
        
    }

    public function update_data(Request $request, Absen $user_absen, $durasi){
        // Absen::where('id', $user_update_id)->update([
        //     'job' => $request->job,
        //     'masalah' => $request->masalah,
        //     'finish' => time(),
        //     'durasi' => $durasi
        // ]);
        // return redirect('/');
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
