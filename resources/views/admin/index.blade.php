@extends('admin/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-3">Daftar Absen Karyawan</h1>

    <a href="/admin/create" class="btn btn-primary mt-2">Tambah Karyawan</a>
    <a href="/admin/user_table" class="btn btn-secondary mt-2">Table Karyawan</a>
    <div class="row">
        <div class="col">
            <table class="table mt-3">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Job</th>
                    <th scope="col">Masalah</th> --}}
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Durasi</th>
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
                    {{-- <td>{{$user_absen->job}}</td>
                    <td>{{$user_absen->masalah}}</td> --}}
                    <td>{{date('H:i', $user_absen->start)}}</td>
                    <td>{{date('H:i', $user_absen->finish)}}</td>
                    <td> 
                        <?php 
                            $durasi = $user_absen->durasi; 
                            $jam = Floor($durasi/(60*60));
                            $menit = floor(($durasi - ($jam * 3600)) / 60);
                            
                        ?>
                        {{$jam . " Jam ". $menit . " Menit"}}
                    </td>
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