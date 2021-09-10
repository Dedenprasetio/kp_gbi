@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

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

<form action="{{ route('talenta.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Pelayanan <b>{{$data->anggota->nama}}</b> </h4>
                      <form class="forms-sample">

                      <div class="form-group{{ $errors->has('nama_talenta') ? ' has-error' : '' }}">
                        
                        <label for="nama_talenta"  class="col-md-2 control-label">Telenta    </label>
                          <div class="col-md-12" >
                                           
                          <label >
                              <input type="radio" name="nama_talenta" value="Khotbah" >
                              Khotbah
                          </label>   &nbsp; &nbsp;
                          <label >
                              <input type="radio" name="nama_talenta" value="Pengajar">
                              Pengajar
                          </label>   &nbsp; &nbsp;
                          <label >
                              <input type="radio" name="nama_talenta" value="Pendoa">
                              Pendoa
                          </label>   &nbsp; &nbsp; 
                          <label>
                          <input type="radio" name="nama_talenta" value="Konselor">
                              Konselor
                          </label>   &nbsp; &nbsp; 
                          <label>
                          <input type="radio" name="nama_talenta" value="Musik">
                              Musik
                          </label>  &nbsp; &nbsp;
                          <label>
                          <input type="radio" name="nama_talenta" value="Singer">
                              Singer
                          </label>  &nbsp; &nbsp;
                          <label>
                          <input type="radio" name="nama_talenta" value="Worship Leader">
                              Worship Leader
                          </label>  &nbsp; &nbsp;
                          <label>
                          <input type="radio" name="nama_talenta" value="Multimedia">
                              Multimedia
                          </label> &nbsp; &nbsp;
                          <label>

                          </div>  
                  </div>
                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Jemaat</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ $data->ket }}" required>
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('talenta.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection