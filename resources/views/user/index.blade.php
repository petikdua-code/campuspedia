@extends('user/main')

@section('title', 'Campuspedia - Admin')

@section('container')
        
    <div class="container">
        <div class="jumbotron my-5">
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">{{Session::get('email')}}</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">

                <a class="btn btn-primary btn-lg" href="/absens/{{Session::get('id')}}" role="button">Absen</a>

            </p>
          </div>
    </div>


@endsection