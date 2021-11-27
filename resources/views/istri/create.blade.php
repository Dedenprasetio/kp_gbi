@section('js')

<script type="text/javascript">

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("anggota_judul").value = $(this).attr('data-anggota_judul');
                document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                $('#myModal2').modal('hide');
            });
            
            $(document).on('click', '.pilih_istri', function (e) {
                document.getElementById("istri_judul").value = $(this).attr('data-istri_judul');
                document.getElementById("istri_id").value = $(this).attr('data-istri_id');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilih_kartukeluarga', function (e) {
                document.getElementById("kartukeluarga_judul").value = $(this).attr('data-kartukeluarga_judul');
                document.getElementById("kartukeluarga_id").value = $(this).attr('data-kartukeluarga_id');
                $('#myModal3').modal('hide');
            });

$(document).ready(function() {
    $(".users").select2();
});

        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts2.app')

@section('content')

<form method="POST" action="{{ route('istri.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Istri <b>{{ $data->anggota->nama }}</b></h4>

                      <br><br>
                      <div class="container  col-md-12">                               
                                                <input type="hidden" required="required" name="kartukeluarga_id" value="{{ $data->id }}" readonly>
                                              </div>

                      <!-- <div class="container  col-md-12">                               
                                                <label>Kepala Keluarga <b style="color:Tomato;">*</b></label>
                                                <select required="required" name="kartukeluarga_id" class="custom-select mb-3" >
                                                  <option value="">Pilih Kepala Keluarga</option>
                                                  @foreach($kk as $a)
                                                 
                                                  <option value="{{ $a->id }}">{{ $a->anggota->kode_anggota }}-{{ $a->anggota->nama }}({{ $a->anggota->sts_dlm_klrg }})</option>
                                                
                                                  @endforeach
                                                </select>
                                              </div> -->

                                              <div class="container  col-md-12">                               
                                                <label>Istri <b style="color:Tomato;">*</b></label>
                                                <select required="required" name="istri_id" class="custom-select mb-3" >
                                                  <option value="">Pilih Istri</option>
                                                  @foreach($istris as $a)
                                                  @if ($a->sts_dlm_klrg == 'Istri')
                                                  <option value="{{ $a->id }}">{{ $a->kode_anggota }}-{{ $a->nama }}({{ $a->sts_dlm_klrg }})</option>
                                                  @endif
                                                  @endforeach
                                                </select>
                                              </div>
                      
                      <!-- <div class="form-group{{ $errors->has('kartukeluarga_id') ? ' has-error' : '' }}">
                        
                        <label for="kartukeluarga_id" class="col-md-7 control-label">Kode Anggota <b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="kartukeluarga_id" type="text" class="form-control" name="kartukeluarga_id" value="{{ $kk }}" readonly="">
                            @if ($errors->has('kartukeluarga_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kartukeluarga_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> -->

                        <!-- <div class="form-group{{ $errors->has('kartukeluarga_id') ? ' has-error' : '' }}">
                            <label for="kartukeluarga_id" class="col-md-12 control-label">Kepala Keluarga</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                <input id="kartukeluarga_judul" type="text" class="form-control"  readonly="" required>
                                <input id="kartukeluarga_id" type="hidden" name="kartukeluarga_id" value="{{ old('kartukeluarga_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('kartukeluarga_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kartukeluarga_id') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div> -->

                        <!-- <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label for="anggota_id" class="col-md-12 control-label">Anggota Keluarga</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                <input id="anggota_judul" type="text" class="form-control"  readonly="" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div> -->
                        
&nbsp; 

                            
                        <!-- <div class="form-group{{ $errors->has('sts_dlm_klrg') ? ' has-error' : '' }}">
                            <label for="sts_dlm_klrg" class="col-md-12 control-label">Status Dalam Keluarga   <b style="color:Tomato;"></b>  </label>
                            <div class="col-md-12">
                            
                            <select class="form-control" name="sts_dlm_klrg" required="">
                            
                            
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Lain-lain">Lain-lain</option>
                                
                                
                            </select>
                            </div>
                        </div> -->
                        
                       
                        <div class="col-md-12">
                       <button type="submit" class="btn btn-primary col-md-5" id="submit">
                                    Simpan
                        </button>
                        <a href="/detailkk/index/{{ $data->id }}" class="btn btn-light pull-right">Kembali</a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>

</form>

 <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Kepala Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                
                            <tr>
                                    <th>NOMOR KARTU KELUARGA</th>
                                    <th>NAMA KEPALA KELUARGA</th>
                                    <th>PERAN KELUARGA</th>
                                    <th>ACTION</th>
                                    <!-- <th>Asal Gereja</th>
                                    <th>Status Dalam Keluarga</th>
                                     <th>Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kk as $data)
                                
                        <tr  class="pilih_kartukeluarga" data-kartukeluarga_id="<?php echo $data->id; ?>" data-kartukeluarga_judul="<?php echo $data->anggota->nama; ?>"  >
                        <td>{{$data->nomor_kk}}</td>
                                    <td>{{$data->anggota->nama}}</td>
                                   
                                    <!-- <td>{{$data->asal_grj}}</td>
                                    <td>{{$data->sts_dlm_klrg}}</td> -->
                                    <td>{{$data->anggota->sts_dlm_klrg}}</td>
                                    <td><label class="pilih_kartukeluarga btn btn-success btn-sm col-md-12 align-center" data-kartukeluarga_id="<?php echo $data->id; ?>" data-kartukeluarga_judul="<?php echo $data->nama; ?>">PILIH</label> </td>
                                
                         <!-- @if($data->sts_anggota == 'Jemaat')
                         <label class="btn btn-success btn-sm col-md-12 align-center">{{$data->sts_anggota}}</label>
                         @else($data->sts_anggota == 'Simpatisan')
                         <label class="btn btn-warning btn-sm col-md-12  align-center">{{$data->sts_anggota}}</label>
                         @endif
                         </td>
                                </tr> -->
                                
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

        
 <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                     <th>PERAN KELUARGA</th>
                                     <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($istris as $data)
                                @if ($data->sts_dlm_klrg == 'Istri')
                        <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_judul="<?php echo $data->nama; ?>" >
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->sts_dlm_klrg}}</td>
                                    <td><label class="pilih_anggota btn btn-success btn-sm col-md-12 align-center" data-anggota_id="<?php echo $data->id; ?>" data-anggota_judul="<?php echo $data->nama; ?>">PILIH</label> </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


@endsection