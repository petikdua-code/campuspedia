@extends('user/main')

@section('title', 'Campuspedia')

@section('container')

<div class="container">
    <h1 class="mt-5">Detail Karyawan</h1>
    <div class="row">
        <div class="col-8">
          
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
                    <input type="text" class="form-control" id="" value="<?= date('H:i', $user->start) ?>">
                  </div>
    
              <?php  if($user->finish == ''){ ?>
                    <div class="form-group">
                      <label for="">Check Out</label>
                      <input type="text" class="form-control" id="" value="-">
                    </div>

             <?php  } else { ?>
                    <div class="form-group">
                      <label for="">Check Out</label>
                      <input type="text" class="form-control" id="" value="<?= date('H:i', $user->finish) ?>">
                    </div>
            <?php   }   ?>
                  

                  <?php 
                        if($user->durasi == ''){ ?>
                          <div class="form-group">
                            <label for="">Durasi</label>
                            <input type="text" class="form-control" id="" value="-">
                          </div>
                  <?php   } else { 
                          $durasi = $user->durasi; 
                          $jam = Floor($durasi/(60*60));
                          $menit = floor(($durasi - ($jam * 3600)) / 60);?>
                          <div class="form-group">
                            <label for="">Durasi</label>
                            <input type="text" class="form-control" id="" value="{{$jam . ' Jam ' . $menit . ' Menit '}}">
                          </div>
                    <?php      } ?>
                        

                  <div class="form-group">
                    <label for="">Durasi</label>
                    <input type="text" class="form-control" id="">
                  </div>

                  <div class="form-group">
                    <label for="">Pekerjaan Terselesaikan</label>
                    <textarea class="form-control" id="" rows="3">{{$user->job}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Masalah / Kendala</label>
                    <textarea class="form-control" id="" rows="3">{{$user->masalah}}</textarea>
                  </div>

                  <a class="btn btn-danger" href="/absen/destroy/{{$user->id}}">Hapus Karyawan</a>
                  <a class="btn btn-light" href="/admin/index">Kembali</a>

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