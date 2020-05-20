@extends('admin/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-5">Detail Karyawan</h1>
    <div class="row">
        <div class="col-8">

            <form action="" class="mt-2">
                @csrf
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
                    <input type="text" class="form-control" id="" value="{{$user->divisi}}">
                  </div>

                  <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" class="form-control" id="" value="{{$user->telp}}">
                  </div>

                  <div class="form-group">
                    <label for="">Admin</label>
                    <input type="text" class="form-control" id="" value="{{$user->admin}}">
                  </div>


                  <a class="btn btn-danger" href="/admin/destroy/{{$user->id}}">Hapus Karyawan</a>
                  <a class="btn btn-light" href="/admin/user_table">Kembali</a>

            </form>

        </div>

        <div class="col-4">
            <div class="card ml-5 text-center p-4">
                <img class="card-img-top" src="https://image.flaticon.com/icons/png/512/16/16480.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-text">{{$user->nama}}</h5>
                  <h6 class="card-text">{{$user->divisi}}</h6>
                </div>
              </div>
        </div>
    </div>
</div>