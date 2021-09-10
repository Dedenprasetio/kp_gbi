
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });
 
} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row" >   
  
<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                        </div>
                        </br> </br>

    <div class="col-lg-2"  style="margin-top: 20px;">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
    </div>


<div class="row">   

<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
             <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cloud-download text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Transaksi</p>
                      <div class="fluid-container">
                        
                        <h3 class="font-weight-medium text-danger mb-0">{{$transaksi->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i> Total seluruh transaksi
                  </p>
                </div>
              </div>
            </div>

<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 20px;">

              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Transaksi</h4>
                   
                   
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode Transaksi 
                          </th>
                          <th>
                            Kategori
                          </th>
                          
                          <th>
                            Tanggal Transaksi
                          </th>
                          <th>
                            Nominal
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Ket
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($transaksi as $data)
                        <tr>
                          <td class="py-1">
                          <a href="{{route('transaksi.show', $data->id)}}"> 
                            {{$data->kode_transaksi}}
                          </a> 
                          </td>
                         
                          <td>
                            {{$data->kategori->nama_ktgr}}
                          </td>
                      
                          <td>
                            {{date('d/m/y', strtotime($data->tgl_transaksi))}}
                          </td>
                          <td>
                            {{$data->jml_Transaksi}}
                          </td>
                          
                          <td>
                            {{$data->nominal}}
                          </td>
              

                          <td>
                          @if($data->status == 'pemasukan')
                            <label class="badge badge-warning">pemasukan</label>
                          @else
                            <label class="badge badge-success">pengeluaran</label>
                          @endif
                          </td>

                          
                         
                           <td>
                            {{$data->ket}}
                          </td>
                          <td>
                          @if(Auth::user()->level == 'admin')
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                          @if($data->status == 'pemasukan')
                          <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah pengeluaran?')"> Sudah pengeluaran
                            </button>
                          </form>
                          @endif
                            
                            <form action="{{ route('transaksi.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                            </form>
                          </div>
                        </div>
                        @else
                        @if($data->status == 'pemasukan')
                        <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah pengeluaran?')">Sudah pengeluaran
                            </button>
                          </form>
                          @else
                          -
                          @endif
                        @endif
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>

@endsection