@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts2.app')
 
@section('content')
<div class="row" style="margin-top: 20px;">
@if(Auth::user()->level == 'admin')
 			                  <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Anggota</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf')}}"> Semua  </a>
                            
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf?sts_anggota=jemaat')}}"> Jemaat </a>
                            <a class="dropdown-item" href="{{url('laporan/agt/pdf?sts_anggota=simpatisan')}}"> Simpatisan </a>
                           
                          </div>
                        </div>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Talenta</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf')}}"> Semua  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Khotbah')}}"> Khotbah  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Pengajar')}}"> Pengajar  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Pendoa')}}"> Pendoa  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Konselor')}}"> Konselor  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Musik')}}"> Musik  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Singer')}}"> Singer  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Worship Leader')}}"> Worship Leader  </a>
                            <a class="dropdown-item" href="{{url('laporan/talenta/pdf?nama_talenta=Multimedia')}}"> Multimedia  </a>
                          </div>
                        </div>
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                       <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Gerwil</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf')}}"> Semua  </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Tengah')}}"> Tengah </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Timur')}}"> Timur </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Barat')}}"> Barat </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Selatan')}}"> Selatan </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Utara')}}"> Utara </a>
                            <a class="dropdown-item" href="{{url('laporan/gwl/pdf?gerwil=Belum')}}"> Belum Bergabung </a>
                          </div>
                        </div>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                       <!-- <div class=" col-lg-2">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF Kartu Keluarga</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            
                            @foreach($kk as $data)
                            <a class="dropdown-item" href="{{ route('laporan.kk_pdf', $data->id) }}" value="{{ $data->id }}">
                              {{ $data->anggota->kode_anggota }}-{{ $data->anggota->nama }}
                            </a>
                            @endforeach
                          </div>
                        </div>           -->

                       
                        <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        <div class="col-lg-2">
                        <a  href="{{url('laporan/dashboard/pdf')}}" class="btn btn-info btn-toggle"><i class="fa fa-download"></i> Download Dashboard</a>
                        </div>
                        </br> </br>   -->              

<div class="col-lg-12">
 @if (Session::has('message'))
<div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
 @endif
</div>
</div>
<div class="row" style="margin-top: 20px;">

@else

<div class="col-md-12 d-flex align-items-stretch grid-margin">

<div class="row flex-grow">
 <div class="col-12">
  <div class="card">
   <div class="card-body">
   <h4 class="card-title col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">Filter Laporan Keuangan</h4>
   
                        <div class="form-group{{ $errors->has('tgl_transaksi') ? ' has-error' : '' }}">
                            <label for="tgl_transaksi" class="col-md-4 control-label">Dari Tanggal</label>
                            <div class="col-md-4">
                                <input id="tgl_transaksi" type="date" class="form-control" name="tgl_transaksi" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
                                @if ($errors->has('tgl_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('tgl_transaksi') ? ' has-error' : '' }}">
                            <label for="tgl_transaksi" class="col-md-4 control-label">Sampai Tanggal</label>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                            
                            <select class="form-control" name="status" required="">
                            
                                <option value="status">Pemasukan</option>
                                <option value="status">Pengeluaran</option>
                                
                            </select>
                            </div>
                        </div>
                               

                        <div class="form-group{{ $errors->has('kategori_id') ? ' has-error' : '' }}">
                            <label for="kategori_id" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-4">
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

                        <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Tampilkan
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Export PDF
                        </button>
                        </div>
                        

   </div>
  </div>
 </div>
</div>


</div>


@endif            
</div>

@endsection