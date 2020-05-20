@extends('admin/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-5">Tambah Karyawan</h1>
    <div class="row">
        <div class="col-8">

            <form action="/admin/create" method="post" class="mt-2">
                @csrf
                <div class="form-group">
                    {{-- @method('patch') --}}
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" id="" name="nama" placeholder="Alfian Prisma Yopiangga">
                  </div>

                  <div class="form-group">
                    <label for="">Alamat Email</label>
                    <input type="text" class="form-control" id="" name="email" placeholder="yopigambyok@gmail.com">
                  </div>

                  <div class="form-group">
                    <label for="">Divisi</label>
                    <input type="text" class="form-control" id="" name="divisi" laceholder="Web Developer">
                  </div>

                  <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" class="form-control" id="" name="telp" placeholder="082330410865">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="12345678">
                  </div>
                  
                  <div class="form-group">
                    <label for="">Admin</label>
                    <input type="text" class="form-control" id="" name="admin" placeholder="Tidak">
                  </div>

                  <br>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  {{-- <button class="btn btn-warning">Hapus Absen</button> --}}
                  <a class="btn btn-light" href="">Kembali</a>

            </form>

        </div>

        <div class="col-4">
            <div class="card ml-5 text-center p-4">
                <img class="card-img-top" src="https://image.flaticon.com/icons/png/512/16/16480.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-text">Yopiangga</h5>
                  <h6 class="card-text">Web Developer</h6>
                </div>
              </div>
        </div>
    </div>
</div>