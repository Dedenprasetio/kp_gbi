@section('js')

<script type="text/javascript">

 $(document).on('click', '.pilih', function (e) {
                document.getElementById("bank_judul").value = $(this).attr('data-bank_judul');
                document.getElementById("bank_id").value = $(this).attr('data-bank_id');
                $('#myModal').modal('hide');
            });


            $(function () {
                $("#lookup, #lookup2").dataTable();
            });

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

<form action="{{ route('kategori.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Kategori <b>{{$data->nama_ktgr}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('nama_ktgr') ? ' has-error' : '' }}">
                            <label for="nama_ktgr" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-6">
                                <input id="nama_ktgr" type="text" class="form-control" name="nama_ktgr" value="{{ $data->nama_ktgr }}">
                                @if ($errors->has('nama_ktgr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_ktgr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Cover</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->cover) src="{{ asset('images/Kategori/'.$data->cover) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}" >
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
                        <a href="{{route('kategori.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>



  
@endsection