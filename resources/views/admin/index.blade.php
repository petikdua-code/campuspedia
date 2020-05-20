@extends('admin/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-3">Daftar Absen Karyawan</h1>

    @if (session('danger'))
    <div class="alert alert-danger mt-3">
        {{session('danger')}}
    </div>
     @endif

     @if (session('success'))
    <div class="alert alert-success mt-3">
        {{session('success')}}
    </div>
     @endif

    <a href="/admin/create" class="btn btn-primary mt-3">Tambah Karyawan</a>
    <a href="/admin/user_table" class="btn btn-secondary mt-3">Table Karyawan</a>
    <div class="row">
        <div class="col">
            <table class="table mt-3">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    {{--  <th scope="col">Durasi</th>  --}}
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users_absen as $user_absen)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user_absen->nama}}</td>
                    <td>{{$user_absen->email}}</td>
                    <td>{{date('H:i', $user_absen->start)}}</td> 
                    <td>
                      <?php 
                        if($user_absen->finish == ''){
                          echo "0";
                        } else {
                          echo date('H:i', $user_absen->finish);
                        }
                      ?>
                      
                    </td>
                    {{--  <td> 
                        <?php 
                        if($user_absen->job == '0'){
                          echo "0 Jam 0 Menit";
                        } else {
                          $durasi = $user_absen->durasi; 
                          $jam = Floor($durasi/(60*60));
                          $menit = floor(($durasi - ($jam * 3600)) / 60);
                          echo $jam . " Jam ". $menit . " Menit";
                          }
                        ?>
                    </td>  --}}
                    <td>{{$user_absen->tgl}}</td>
                    <td>
                        <a href="/user/detail/{{$user_absen->id}}" class="badge badge-info">Detail</a>
                    </td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
</div>