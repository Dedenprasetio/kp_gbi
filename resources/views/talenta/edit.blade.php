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
                        <li class="breadcrumb-item"><a href="/talenta">Pelayanan</a></li>
                        <li class="breadcrumb-item active">Edit Pelayanan</li>
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

          <form action="{{ route('talenta.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}

          <!-- AREA FORM -->

          


          <div class="form-group{{ $errors->has('nama_talenta') ? ' has-error' : '' }}">
                    
                      <h4 class="card-title">Edit Pelayanan <b>{{$data->anggota->nama}} - {{$data->nama_talenta}} </b>  </h4>

                      <br>
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
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
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
                                    Kirim
                        </button>
                        <a href="{{route('talenta.index')}}" class="btn btn-light pull-right">Kembali</a>
         
         
         
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