@extends('auth/main')

@section('title', 'Login Campuspedia')

@section('container')
  <div class="container mt-2">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                  </div>

                  @if (session('danger'))
                  <div class="alert alert-danger">
                      {{session('danger')}}
                  </div>
                   @endif

                   @if (session('success'))
                  <div class="alert alert-success">
                      {{session('success')}}
                  </div>
                   @endif

                  <form class="user" method="post" action="/auth">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="">
                      
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                   
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>
                  <hr>

                  <div class="text-center">
                    <a class="small" href="#">Campuspedia Absensi</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  @endsection