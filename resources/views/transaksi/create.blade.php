@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("kategori_judul").value = $(this).attr('data-kategori_judul');
                document.getElementById("kategori_id").value = $(this).attr('data-kategori_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_jemaat', function (e) {
                document.getElementById("jemaat_id").value = $(this).attr('data-jemaat_id');
                document.getElementById("jemaat_nama").value = $(this).attr('data-jemaat_nama');
                $('#myModal2').modal('hide');
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

<form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    
                      <h4 class="card-title col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">Tambah transaksi baru</h4>
                    
                        <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode transaksi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('tgl_transaksi') ? ' has-error' : '' }}">
                            <label for="tgl_transaksi" class="col-md-4 control-label">Tanggal transaksi</label>
                            <div class="col-md-6">
                                <input id="tgl_transaksi" type="date" class="form-control" name="tgl_transaksi" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
                                @if ($errors->has('tgl_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            
                            <select class="form-control" name="status" required="">
                            
                                <option value="status">Pemasukan</option>
                                <option value="status">Pengeluaran</option>
                                
                            </select>
                            </div>
                        </div>
                               

                        <div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                            <label for="kategori_id" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="kategori_judul" type="text" class="form-control" readonly="" required>
                                <input id="kategori_id" type="hidden" name="kategori_id" value="{{ old('kategori_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('kategori_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        

                        
                        <div class="form-group{{ $errors->has('nominal') ? ' has-error' : '' }}">
                            <label for="nominal" class="col-md-4 control-label">Nominal</label>
                            <div class="col-md-6">
                                <input id="nominal" type="number" class="form-control" name="nominal" value="{{ old('nominal') }}">
                                @if ($errors->has('nominal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nominal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Bukti Transaksi / Jika Ada</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="bukti">
                            </div>
                        </div> 

                                         
                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }} " >
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        </div>
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $data)
                                <tr class="pilih" data-kategori_id="<?php echo $data->id; ?>" data-kategori_judul="<?php echo $data->nama_ktgr; ?>" >
                                    <td>@if($data->cover)
                            <img src="{{url('images/kategori/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/kategori/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          {{$data->nama_ktgr}}</td>           
                                    <td>{{$data->ket}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


@endsection