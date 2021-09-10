@section('js')
<script type="text/javascript">
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

@extends('layouts.app')

@section('content')




<div class="row">
            <div class="col-md-4 d-flex align-items-center grid-margin " >
              <div class="row flex-grow">
                <div class="col-12 ">
                  <div class="card">
                    <div class="card-body">
                      
                      <form class="forms-sample">
                    
                   <h4 class="col-md-12" ><b>{{$data->nama}}</b></h4>
                      
                      
          
                            </br>
                            <div class="col-md-12">
                                <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/anggota/'.$data->gambar) }}" @endif />
                            </div>
                            </br>
                        
                            
                    

                      
                            <label class="col-md-12"><b>NOMER INDUK : </b> {{$data->kode_anggota}}</label>
                            <label class="col-md-12"><b>STATUS KEANGGOTAAN : </b> {{$data->sts_anggota}}</label>
                            <label class="col-md-12"><b>NAMA : </b> {{$data->nama}}</label>
                            <label class="col-md-12"><b>TEMPAT LAHIR : </b> {{$data->tempat_lahir}}</label>
                            <label class="col-md-12"><b>TANGGAL LAHIR : </b> {{$data->tgl_lahir}}</label>
                            <label class="col-md-12"><b>JENIS KELAMIN : </b> {{$data->jk}}</label>
                            <label class="col-md-12"><b>GOLONGAN DARAH  : </b> {{$data->goldar}}</label>
                            
                           
                         

                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-4 d-flex align-items-center grid-margin " >
              <div class="row flex-grow">
                <div class="col-12 ">
                  <div class="card">
                    <div class="card-body">
                    
                    <label class="col-md-12"><b>STATUS DALAM KELUARGA : </b> {{$data->sts_dlm_klrg}}</label>
                            <label class="col-md-12"><b>STATUS PERNIKAHAN : </b> {{$data->sts_pernikahan}}</label>
                            

                            </br>
                            </br>
                            <label class="col-md-12"><b>AYAH : </b> {{$data->ayah}}</label>
                    <label class="col-md-12"><b>IBU : </b> {{$data->ibu}}</label>
                            </br>
                            <label class="col-md-12"><b>STATUS KELUARGA : </b> {{$data->sts_keluarga}}</label>
                            </br>
                            </br>
                            
                    <label class="col-md-12"><b>TANGGAL BAPTIS : </b> {{$data->tgl_baptis}}</label>
                    <label class="col-md-12"><b>BAPTIS DI  : </b> {{$data->grj_baptis}}</label>
                    <label class="col-md-12"><b>ASAL GEREJA  : </b> {{$data->asal_grj}}</label>
                 
                    <label class="col-md-12"><b>PENDIDIKAN  : </b> {{$data->pendidikan}}</label>
                    <label class="col-md-12"><b>BIDANG ILMU  : </b> {{$data->jurusan}}</label>
                    <label class="col-md-12"><b>PEKERJAAN : </b> {{$data->pekerjaan}}</label>
                    </br>                       
                    </br>
                    </br>
                    </br></br>
                            
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex align-items-center grid-margin " >
              <div class="row flex-grow">
                <div class="col-12 ">
                  <div class="card">
                    <div class="card-body">
                    <label class="col-md-12"><b>GEREJA WILAYAH : </b> {{$data->gerwil}}</label>
                    </br>
                    </br>
                            <label class="col-md-12"><b>ALAMAT KTP : </b></label>
                            <label class="col-md-12"><b>ALAMAT : </b> {{$data->alamat}}</label>
                            <label class="col-md-12"><b>KELURAHAN : </b> {{$data->kelurahan}}</label>
                            <label class="col-md-12"><b>KECAMATAN : </b> {{$data->kecamatan}}</label>
                            <label class="col-md-12"><b>KOTA : </b> {{$data->kota}}</label>
                            <label class="col-md-12"><b>PROVINSI : </b> {{$data->provinsi}}</label>
                            </br>
                            </br>
                            <label class="col-md-12"><b>ALAMAT DOMISILI : </b></label>
                            <label class="col-md-12"><b>ALAMAT : </b> {{$data->alamat_domisili}}</label>
                            <label class="col-md-12"><b>KELURAHAN : </b> {{$data->kelurahan_domisili}}</label>
                            <label class="col-md-12"><b>KECAMATAN : </b> {{$data->kecamatan_domisili}}</label>
                            <label class="col-md-12"><b>KOTA : </b> {{$data->kota_domisili}}</label>
                            <label class="col-md-12"><b>PROVINSI : </b> {{$data->provinsi_domisili}}</label>
                            </br>
                            </br>
                            
                    </div>
                  </div>
                </div>
              </div>
            </div>



</div>
@endsection