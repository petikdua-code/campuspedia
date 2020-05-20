@extends('admin/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-3">Daftar Karyawan</h1>

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
                    <th scope="col">Divisi</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->nama}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->divisi}}</td>
                    <td>{{$user->telp}}</td>
                    <td>{{$user->admin}}</td>
                    <td>
                        <a href="/user/detail/{{$user->id}}" class="badge badge-info">Detail</a>
                        <a href="/user/detail/{{$user->id}}" class="badge badge-danger">Delete</a>
                    </td>

                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
</div>