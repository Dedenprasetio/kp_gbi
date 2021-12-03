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
                        <li class="breadcrumb-item active">Edit Anggota</li>
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
                               
                            <option value="Tengah" @php if(($data->gerwil)=='Tengah') echo 'selected' @endphp>Tengah</option>
                                <option value="Timur" @php if(($data->gerwil)=='Timur') echo 'selected' @endphp>Timur</option>
                                <option value="Barat" @php if(($data->gerwil)=='Barat') echo 'selected' @endphp>Barat</option>
                                <option value="Selatan" @php if(($data->gerwil)=='Selatan') echo 'selected' @endphp>Selatan</option>
                                <option value="Utara" @php if(($data->gerwil)=='Utara') echo 'selected' @endphp>Utara</option>
                                <option value="Belum" @php if(($data->gerwil)=='Belum') echo 'selected' @endphp>Belum Bergabung</option>
                                
                            </select>
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('sts_dlm_klrg') ? ' has-error' : '' }}">
                            <label for="sts_dlm_klrg" class="col-md-12 control-label">Status Dalam Keluarga   </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_dlm_klrg" required="">
                            <option hidden disabled selected value>Status Dalam Keluarga</option>
                            @if($data->jk == 'Pria')
                            <option value="Suami" @php if(($data->sts_dlm_klrg)=='Suami') echo 'selected' @endphp>Suami</option>
                                <option value="Anak" @php if(($data->sts_dlm_klrg)=='Anak') echo 'selected' @endphp>Anak</option>
                                <option value="Lain-lain" @php if(($data->sts_dlm_klrg)=='Lain-lain') echo 'selected' @endphp>Lain-lain</option>
                            @elseif($data->jk == 'Wanita')   
                                <option value="Istri" @php if(($data->sts_dlm_klrg)=='Istri') echo 'selected' @endphp>Istri</option>
                                <option value="Anak" @php if(($data->sts_dlm_klrg)=='Anak') echo 'selected' @endphp>Anak</option>
                                <option value="Lain-lain" @php if(($data->sts_dlm_klrg)=='Lain-lain') echo 'selected' @endphp>Lain-lain</option>
                            @endif
                            </select>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('sts_pernikahan') ? ' has-error' : '' }}">
                            <label for="sts_pernikahan" class="col-md-12 control-label">Status Pernikahan   </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_pernikahan" required="">
                            <option hidden disabled selected value >Status Pernikahan</option>
                            <option value="Belum" @php if(($data->sts_pernikahan)=='Belum') echo 'selected' @endphp>Belum Menikah</option>
                                <option value="Menikah" @php if(($data->sts_pernikahan)=='Menikah') echo 'selected' @endphp>Menikah</option>
                                @if($data->jk == 'Wanita')
                                <option value="Janda" @php if(($data->sts_pernikahan)=='Janda') echo 'selected' @endphp>Janda</option>
                                @elseif($data->jk == 'Pria')
                                <option value="Duda" @php if(($data->sts_pernikahan)=='Duda') echo 'selected' @endphp>Duda</option>
                                @endif
                                
                            </select>
                            </div>
                        </div>

                    
                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-12 control-label" >Status Anggota    </label>
                              
                                <label>
                                    <input type="radio" name="sts_anggota" value="Jemaat" @php if(($data->sts_anggota)=='Jemaat') echo 'checked' @endphp>
                                    Jemaat
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_anggota" value="Simpatisan" @php if(($data->sts_anggota)=='Simpatisan') echo 'checked' @endphp>
                                    Simpatisan
                                </label>   &nbsp; &nbsp; 
                                
                        </div>

                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-12 control-label">Pekerjaaan  </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="pekerjaan" required="">
                               
                            <option value="Wiraswasta" @php if(($data->pekerjaan)=='Wiraswasta') echo 'selected' @endphp>Wiraswasta</option>
                                <option value="PNS" @php if(($data->pekerjaan)=='PNS') echo 'selected' @endphp>PNS</option>
                                <option value="Guru/Dosen/Instruktur" @php if(($data->pekerjaan)=='Guru/Dosen/Instruktur') echo 'selected' @endphp>Guru/Dosen/Instruktur</option>
                                <option value="Pelajar/Mahasiswa" @php if(($data->pekerjaan)=='Pelajar/Mahasiswa') echo 'selected' @endphp>Pelajar/Mahasiswa</option>
                                <option value="Lainnya" @php if(($data->pekerjaan)=='Lainnya') echo 'selected' @endphp>Lainnya</option>
                            </select>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP  </label>
                            <div class="col-md-12">
                                <input id="hp" type="number" maxlength="4" class="form-control" name="hp" value="{{ $data->hp }}" required>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hp') }}</strong>
                                    </span>
                                @endif
                            </div>
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