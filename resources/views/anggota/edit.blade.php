@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts2.app')

@section('content')


<div class="row" style="margin-center: 20px;">


          

  <div class="col-lg-12 grid-margin stretch-card ">

    <div class="card  ">
      <div class="card-body">


                        <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/anggota">Anggota</a></li>
                        <li class="breadcrumb-item active">Ubah Anggota</li>
                        </ol>
                        <br><br>
      

      

        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="align-items-center">

    
        <div class="col-lg-6 mx-auto">
        <!-- <form class="form-horizontal " method="POST" action="">
          {{ csrf_field() }} -->

          <form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}

          <!-- AREA FORM -->

          <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-12 control-label">Nama Anggota</label>
                            <div class="col-md-12">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-12">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  
                        <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                        <label for="gerwil" class="col-md-12 control-label">Gereja Wilayah</label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="gerwil" required="">
                               
                            <option value="Tengah">Tengah</option>
                                <option value="Timur">Timur</option>
                                <option value="Barat">Barat</option>
                                <option value="Selatan">Selatan</option>
                                <option value="Utara">Utara</option>
                                <option value="Belum">Belum Bergabung</option>
                                
                            </select>
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('sts_dlm_klrg') ? ' has-error' : '' }}">
                            <label for="sts_dlm_klrg" class="col-md-12 control-label">Status Dalam Keluarga   <b style="color:Tomato;">*</b>  </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_dlm_klrg" required="">
                            <option >Status Dalam Keluarga</option>
                            <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Lain-lain">Lain-lain</option>
                                
                                
                            </select>
                            </div>
                        </div>

                    
                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-12 control-label" >Status Anggota    </label>
                              
                                <label>
                                    <input type="radio" name="sts_anggota" value="Jemaat">
                                    Jemaat
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_anggota" value="Simpatisan">
                                    Simpatisan
                                </label>   &nbsp; &nbsp; 
                                
                        </div>
                     

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-12">
                                <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/anggota/'.$data->gambar) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                            </div>
                        </div>
         
         
          <div class="col-md-12">
                       <button type="submit" class="btn btn-primary col-md-3" id="submit">
                                    Kirim
                        </button>
                        <button type="reset" class="btn btn-danger col-md-3">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Kembali</a>
                        </div> 
          <!-- TUTUP AREA FORM -->

        </form>
        </div>

</div>



</div>

      </div>

    </div>
    


  </div>
  <!-- #/ container -->
</div>

@endsection