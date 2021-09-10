@section('js')
 <script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("gerwil_judul").value = $(this).attr('data-gerwil_judul');
                document.getElementById("gerwil_id").value = $(this).attr('data-gerwil_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_ayah', function (e) {
                document.getElementById("ayah_judul").value = $(this).attr('data-ayah_judul');
                document.getElementById("ayah_id").value = $(this).attr('data-ayah_id');
                $('#myModal2').modal('hide');
            });

            $(document).on('click', '.pilih_ibu', function (e) {
                document.getElementById("ibu_judul").value = $(this).attr('data-ibu_judul');
                document.getElementById("ibu_id").value = $(this).attr('data-ibu_id');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilih_keluarga1', function (e) {
                document.getElementById("sts_keluarga").value = $(this).attr('data-sts_keluarga');
                document.getElementById("sts_keluarga").value = $(this).attr('data-sts_keluarga');
                $('#myModal4').modal('hide');
            });
            

            $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}


<div class="row">


<div class="col-md-6 d-flex align-items-stretch grid-margin">
<div class="row flex-grow">
                <div class="card-body">
            
                  <div class="card">
                    <div class="card-body">
                      

                        <div class="form-group{{ $errors->has('kode_anggota') ? ' has-error' : '' }}">
                        
                            <label for="kode_anggota" class="col-md-7 control-label">Kode Anggota <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="kode_anggota" type="text" class="form-control" name="kode_anggota" value="{{ $kode }}" readonly="">
                                @if ($errors->has('kode_anggota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_anggota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>

                        <div class="form-group{{ $errors->has('sts_anggota') ? ' has-error' : '' }}">
                              <label for="sts_anggota" class="col-md-5 control-label" readonly="" >Status Anggota  <b style="color:Tomato;">*</b>  </label>
                              
                                <label>
                                    <input type="radio" name="sts_anggota" value="Jemaat" required> 
                                    Jemaat
                                </label>   &nbsp; &nbsp; 
                                <label>
                                <input type="radio" name="sts_anggota" value="Simpatisan" required>
                                    Simpatisan
                                </label>   &nbsp; &nbsp; 
                                    
                        </div>


                        </br>
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama Lengkap  <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir  <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ date('d-m-Y', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                              <label for="jk" class="col-md-5 control-label">Jenis Kelamin  <b style="color:Tomato;">*</b>  </label>
                              
                                <label>
                                    <input type="radio" name="jk" value="Pria" required>
                                    Pria
                                </label>   &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;
                                <label>
                                <input type="radio" name="jk" value="Wanita" required>
                                Wanita
                                </label>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('sts_dlm_klrg') ? ' has-error' : '' }}">
                            <label for="sts_dlm_klrg" class="col-md-12 control-label">Status Dalam Keluarga   <b style="color:Tomato;">*</b>  </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_dlm_klrg" required="">
                            
                            <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Lain-lain">Lain-lain</option>
                                
                                
                            </select>
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('sts_pernikahan') ? ' has-error' : '' }}">
                            <label for="sts_pernikahan" class="col-md-12 control-label">Status Pernikahan   <b style="color:Tomato;">*</b>  </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_pernikahan" required="">
                            
                            <option value="Belum">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Janda">Janda</option>
                                <option value="Duda">Duda</option>
                                
                                
                            </select>
                            </div>
                        </div>

                        </br>
            <div class="card  col-md-12">
            <label >Alamat</label>
            
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class=" control-label">Sesuai KTP   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('alamat_domisili') ? ' has-error' : '' }}">
                            <label for="alamat_domisili" class=" control-label">Domisili</label>
                            
                                <input id="alamat_domisili" type="text" class="form-control" name="alamat_domisili" value="{{ old('alamat_domisili') }}">
                                @if ($errors->has('alamat_domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat_domisili') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
        

            <div class="card  col-md-12">
            <label >Kelurahan</label>
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kelurahan') ? ' has-error' : '' }}">
                            <label for="kelurahan" class=" control-label">Sesuai KTP   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="kelurahan" type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan') }}" required>
                                @if ($errors->has('kelurahan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kelurahan_domisili') ? ' has-error' : '' }}">
                            <label for="kelurahan_domisili" class=" control-label">Domisili</label>
                            
                                <input id="kelurahan_domisili" type="text" class="form-control" name="kelurahan_domisili" value="{{ old('kelurahan_domisili') }}" >
                                @if ($errors->has('kelurahan_domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelurahan_domisili') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
            </br>

            
            <div class="card  col-md-12">
            <label >Kecamatan</label>
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kecamatan') ? ' has-error' : '' }}">
                            <label for="kecamatan" class=" control-label">Sesuai KTP   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="kecamatan" type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan') }}" required>
                                @if ($errors->has('kecamatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kecamatan_domisili') ? ' has-error' : '' }}">
                            <label for="kecamatan_domisili" class=" control-label">Domisili</label>
                            
                                <input id="kecamatan_domisili" type="text" class="form-control" name="kecamatan_domisili" value="{{ old('kecamatan_domisili') }}" >
                                @if ($errors->has('kecamatan_domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kecamatan_domisili') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
            </br>

      
            <div class="card  col-md-12">
            <label >Kabupaten</label>
              <div class="row flex-grow">
              
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kota') ? ' has-error' : '' }}">
                            <label for="kota" class=" control-label">Sesuai KTP   <b style="color:Tomato;">*</b>  </label>
                                <input id="kota" type="text" class="form-control" name="kota" value="{{ old('kota') }}" required>
                                @if ($errors->has('kota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('kota_domisili') ? ' has-error' : '' }}">
                            <label for="kota_domisili" class=" control-label">Domisili</label>
                            
                                <input id="kota_domisili" type="text" class="form-control" name="kota_domisili" value="{{ old('kota_domisili') }}" >
                                @if ($errors->has('kota_domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota_domisili') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
            </br>

                
            <div class="card  col-md-12">
            <label >Provinsi</label>
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                            <label for="provinsi" class=" control-label">Sesuai KTP   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="provinsi" type="text" class="form-control" name="provinsi" value="{{ old('provinsi') }}" required>
                                @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('provinsi_domisili') ? ' has-error' : '' }}">
                            <label for="provinsi_domisili" class=" control-label">Domisili</label>
                            
                                <input id="provinsi_domisili" type="text" class="form-control" name="provinsi_domisili" value="{{ old('provinsi_domisili') }}" >
                                @if ($errors->has('provinsi_domisili'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('provinsi_domisili') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>





            <div class="col-md-6 d-flex align-items-stretch grid-margin">
                <div class="row flex-grow">
                <div class="card-body">
            
                  <div class="card">
                    <div class="card-body">
                  
                    <div class="form-group{{ $errors->has('gerwil') ? ' has-error' : '' }}">
                            <label for="gerwil" class="col-md-12 control-label">Gereja Wilayah   <b style="color:Tomato;">*</b>  </label>
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
                        </br>

            <div class="card  col-md-12">
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('ayah') ? ' has-error' : '' }}">
                            <label for="ayah" class=" control-label">Ayah   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="ayah" type="text" class="form-control" name="ayah" value="{{ old('ayah') }}" required>
                                @if ($errors->has('ayah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ayah') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('ibu') ? ' has-error' : '' }}">
                            <label for="ibu" class=" control-label">Ibu   <b style="color:Tomato;">*</b>  </label>
                            
                                <input id="ibu" type="text" class="form-control" name="ibu" value="{{ old('ibu') }}" required>
                                @if ($errors->has('ibu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ibu') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
            </br>

            <div class="card  col-md-12">
              <div class="row flex-grow">
              <div class="col-md-6">
                        <div class="form-group{{ $errors->has('tgl_baptis') ? ' has-error' : '' }}">
                            <label for="tgl_baptis" class=" control-label">Tanggal Baptis  </label>
                            
                                <input id="tgl_baptis" type="date" class="form-control" name="tgl_baptis" value="{{ old('tgl_baptis') }}">
                                @if ($errors->has('tgl_baptis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_baptis') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('grj_baptis') ? ' has-error' : '' }}">
                            <label for="grj_baptis" class=" control-label">di Gereja   </label>
                            
                                <input id="grj_baptis" type="text" class="form-control" name="grj_baptis" value="{{ old('grj_baptis') }}" >
                                @if ($errors->has('grj_baptis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grj_baptis') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>                 
                </div>
              <!-- /.card-body -->
            </div>
            </br>
                        <div class="form-group{{ $errors->has('asal_grj') ? ' has-error' : '' }}">
                            <label for="asal_grj" class="col-md-4 control-label">Asal Gereja  <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="asal_grj" type="text" class="form-control" name="asal_grj" value="{{ old('asal_grj') }}" required>
                                @if ($errors->has('asal_grj'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asal_grj') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


            </br>
                        <div class="form-group{{ $errors->has('goldar') ? ' has-error' : '' }}">
                              <label for="goldar" class="col-md-5 control-label">Golongan Darah   <b style="color:Tomato;">*</b>   </label>
                              
                                <label>
                                    <input type="radio" name="goldar" value="A" required>
                                    A
                                </label>   &nbsp; 
                                <label>
                                <input type="radio" name="goldar" value="B" required>
                                B
                                </label> &nbsp; 
                                <label>
                                <input type="radio" name="goldar" value="AB" required>
                                AB
                                </label> &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="O" required>
                                O
                                </label> &nbsp;
                                <label>
                                <input type="radio" name="goldar" value="RH" required>
                                RH
                                </label> &nbsp;   
                                <label>
                                <input type="radio" name="goldar" value="RH+" required>
                                RH+
                                </label>                                     
                        </div>
                        </br>

<div class="card  col-md-12">
  <div class="row flex-grow">
  <div class="col-md-6">
            <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                <label for="pendidikan" class=" control-label">Pendidikan  <b style="color:Tomato;">*</b> </label>
                
                <select class="form-control" name="pendidikan" required="">
                               
                                   <option value="SD">SD</option>
                                   <option value="SLTP">SLTP</option>
                                   <option value="SLTA">SLTA</option>
                                   <option value="D1">D1</option>
                                   <option value="D2">D2</option>
                                   <option value="D3">D3</option>
                                   <option value="S1">S1</option>
                                   <option value="S2">S2</option>
                                   <option value="S3">S3</option>
                               </select>
               
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                <label for="jurusan" class=" control-label">Bidang Ilmu  <b style="color:Tomato;">*</b> </label>
                
                    <input id="jurusan" type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}" required>
                    @if ($errors->has('jurusan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jurusan') }}</strong>
                        </span>
                    @endif
            </div>
            </div>                 
    </div>
  <!-- /.card-body -->
</div>
                    </br>
                        <div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            <label for="pekerjaan" class="col-md-12 control-label">Pekerjaaan  <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="pekerjaan" required="">
                               
                            <option value="Wiraswasta">Wiraswasta</option>
                                <option value="PNS">PNS</option>
                                <option value="Guru/Dosen/Instruktur">Guru/Dosen/Instruktur</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('hp') ? ' has-error' : '' }}">
                            <label for="hp" class="col-md-4 control-label">No HP  <b style="color:Tomato;">*</b> </label>
                            <div class="col-md-12">
                                <input id="hp" type="number" maxlength="4" class="form-control" name="hp" value="{{ old('hp') }}" required>
                                @if ($errors->has('hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nij') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </br>
                        <div class="form-group{{ $errors->has('sts_keluarga') ? ' has-error' : '' }}">
                            <label for="sts_keluarga" class="col-md-12 control-label">Silsilah Keluarga (Jika tidak ada isi - )</label>
                            <div class="col-md-12">
                                <div class="input-group"  >
                                <input id="sts_keluarga" type="text" class="form-control"     >
                                <input id="sts_keluarga" type="hidden" multiple="multiple" name="sts_keluarga" value="{{ old('sts_keluarga') }}" readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal4"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('sts_keluarga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sts_keluarga') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>

                        </br>
                        <div class="form-group">
                            <label for="email" class="col-md-12 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                            </div>
                        </div>

                        </br>
                        </br>
                        </br>

                        </br>
                        <div class="col-md-12">
                       <button type="submit" class="btn btn-primary col-md-4" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger col-md-4">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right col-md-3">Back</a>
                        </div>
                        </br>

                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>




</form>


 
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari ayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kabupaten</th>
                                    <th>Asal Gereja</th>
                                     <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                        <tr class="pilih_keluarga1" data-sts_keluarga="<?php echo $data->nama; ?>" data-sts_keluarga="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->kota}}</td>
                                    <td>{{$data->asal_grj}}</td>
                                    
                                    <td>
                         
                         @if($data->sts_anggota == 'Jemaat')
                         <label class="btn btn-success btn-sm col-md-12 align-center">{{$data->sts_anggota}}</label>
                         @else($data->sts_anggota == 'Simpatisan')
                         <label class="btn btn-warning btn-sm col-md-12  align-center">{{$data->sts_anggota}}</label>
                         @endif
                         </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection