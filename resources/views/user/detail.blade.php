@extends('user/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-5">Detail Karyawan</h1>
    <div class="row">
        <div class="col-8">

            <form action="" class="mt-2">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" id="" value="{{$user->nama}}">
                  </div>

                  <div class="form-group">
                    <label for="">Alamat Email</label>
                    <input type="text" class="form-control" id="" value="{{$user->email}}">
                  </div>

                  <div class="form-group">
                    <label for="">Divisi</label>
                    <input type="text" class="form-control" id="" value="{{$user_detail->divisi}}">
                  </div>

                  <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" class="form-control" id="" value="{{$user_detail->telp}}">
                  </div>


                  <div class="form-group">
                    <label for="">Check In</label>
                    <input type="text" class="form-control" id="" value="{{$user->start}}">
                  </div>

                  <div class="form-group">
                    <label for="">Check Out</label>
                    <input type="text" class="form-control" id="" value="{{$user->finish}}">
                  </div>

                  <div class="form-group">
                    <label for="">Durasi</label>
                    <input type="text" class="form-control" id="" value="{{$user->durasi}}">
                  </div>

                  <div class="form-group">
                    <label for="">Pekerjaan Terselesaikan</label>
                    <textarea class="form-control" id="" rows="3">{{$user->job}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Masalah / Kendala</label>
                    <textarea class="form-control" id="" rows="3">{{$user->masalah}}</textarea>
                  </div>

                  <button class="btn btn-danger">Hapus Karyawan</button>
                  {{-- <button class="btn btn-warning">Hapus Absen</button> --}}
                  <button class="btn btn-light">Kembali</button>

            </form>

        </div>

        <div class="col-4">
            <div class="card ml-5 text-center p-4">
                <img class="card-img-top" src="https://image.flaticon.com/icons/png/512/16/16480.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-text">{{$user->nama}}</h5>
                  <h6 class="card-text">{{$user_detail->divisi}}</h6>
                </div>
              </div>
        </div>
    </div>
</div>