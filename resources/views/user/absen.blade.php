@extends('user/main')

@section('title', 'Campuspedia')

@section('container')

<?php 
        $stringDate = date('H:i d-m-Y', $user_absen->start); 

?>

        
    <div class="container">
        <div class="jumbotron my-5">
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">{{Session::get('email')}}</p>
            <hr class="my-4">
                
            <p>Status <span class="badge badge-success">Check In</span> {{$stringDate}}</p>
            <p>{{$user_absen->id}}</p>
            <p class="lead">

                <form method="post" action="/user/absen/{{$user_absen->id}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <label for="job">Pekerjaan Terselesaikan</label>
                      <input type="text" class="form-control" id="job" placeholder="Membuat design pamflet" name="job" value="{{old('job') }}">
                    </div>
                    <div class="form-group">
                        <label for="masalah">Masalah / Kendala</label>
                        <textarea class="form-control" id="masalah" rows="3" name="masalah" value="{{old('masalah') }}"></textarea>
                    </div>

                        <button class="btn btn-primary btn-lg" type="submit" role="button">Check Out</button>

                  </form>       

            </p>
          </div>
    </div>

    


@endsection