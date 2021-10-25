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

<form action="{{ route('kk.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Kepala Keluarga <b>{{$data->anggota->nama}}</b> </h4>
                      <form class="forms-sample">

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Nomor Kartu Keluarga </label>
                            <div class="col-md-6">
                                <input id="nomor_kk" type="text" class="form-control" name="nomor_kk" value="{{ $data->nomor_kk}}" required readonly="">
                                @if ($errors->has('nomor_kk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_kk') }}</strong>
                                    </span>
                                @endif

                            </div>

                            
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('kk.index')}}" class="btn btn-light pull-right">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection