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
<div class="row">

                        
            
</div>
<div class="row" style="margin-center: 20px;">


          

  <div class="col-lg-12 grid-margin stretch-card ">

    <div class="card ">
      <div class="card-body">

      <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/kk">Data Kartu Keluarga</a></li>
                        <li class="breadcrumb-item"><a href="/detailkk/index/{{ $data->id }}">Detail Kartu Keluarga</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota Keluarga</li>
                        </ol> 
                        </br></br>
                        
                                          <!-- SESSION -->
@if (Session::has('message'))
                        <div class="alert alert-success alert-block alert-{{ Session::get('message_type') }}">
                          <button type="button btn-light" class="close" data-dismiss="alert">×</button>    
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                      @endif
                        <!-- END SESSION -->

<div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="align-items-center">

    
        <div class="col-lg-6 mx-auto">

<form method="POST" action="{{ route('detailkk.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

          <!-- AREA FORM -->

          <h4 class="card-title">Tambah Anggota Keluarga <b>{{ $data->anggota->nama }}</b></h4>
        
          <br><br>
                      <div class="container  col-md-12">                               
                                                <input type="hidden" required="required" name="kartukeluarga_id" value="{{ $data->id }}" readonly>
                                              </div>
                                              
                                              <div class="container  col-md-12">                               
                                                <label>Anggota Keluarga <b style="color:Tomato;">*</b></label>
                                                <select required="required" name="anggota_id" class="custom-select mb-3" >
                                                  <option value="">Pilih Anggota Keluarga</option>
                                                  @foreach($anggotas as $a)
                                                  @if ($a->sts_dlm_klrg == 'Anak')
                                                  <option value="{{ $a->id }}">{{ $a->kode_anggota }}-{{ $a->nama }}({{ $a->sts_dlm_klrg }})</option>
                                                  @endif
                                                  @endforeach
                                                </select>
                                              </div>
&nbsp;



          
         
                        <div class="col-md-12">
                       <button type="submit" class="btn btn-primary col-md-5" id="submit">
                                    Simpan
                        </button>
                        <a href="/detailkk/index/{{ $data->id }}" class="btn btn-light pull-right">Kembali</a>
                        </div>
                        &nbsp; 

          <!-- TUTUP AREA FORM -->

        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    

@endsection

