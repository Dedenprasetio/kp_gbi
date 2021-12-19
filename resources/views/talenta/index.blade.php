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
<div class="row">

    </div>

<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

              
                <div class="card-body">
                <a href="{{ route('talenta.create') }}" class="btn btn-primary  btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah Pelayanan</a>

                <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pelayanan</li>
                        </ol> 
                        </br></br>

                        @if (Session::has('message'))
                        <div class="alert alert-success alert-block alert-{{ Session::get('message_type') }}">
                          <button type="button btn-light" class="close" data-dismiss="alert">×</button>    
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                      @endif
             
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th width="1%">NO</th>
                        <th class="text-center">NAMA</th>
                       
                        <th class="text-center">PELAYANAN</th>
                        <th class="text-center">JK</th>
                        <th class="text-center">NO HP</th>
                        <th class="text-center">KETERANGAN</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">DIUBAH</th>
                        <!-- <th class="text-center">JENIS</th> -->

                        
                        
                        @if(Auth::user()->level == 'admin')
                        <th class="text-center col-md-2" width="10%">OPSI</th>
                        @endif
                        </tr>
                        </thead>
                      <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($talenta as $data)
                        <tr>
                        <td class="text-left">{{ $no++ }}</td>
                    
                          <td class="py-1"> 
                            {{$data->anggota->nama}}
                            
                          </td>
                    
                          <td>
                            {{$data->nama_talenta}}
                          </td>
                         
                          <td>
                            {{$data->anggota->jk}}
                          </td>
                          
                          <td>
                            {{$data->anggota->hp}}
                          </td>
                          <td>
                            {{$data->ket}}
                          </td>

                        <td>                      
                         @if($data->anggota->sts_anggota == 'Jemaat')
                         <label class="text-success">{{$data->anggota->sts_anggota}}</label>
                         @else($data->anggota->sts_anggota == 'Simpatisan')
                         <label class="text-warning">{{$data->anggota->sts_anggota}}</label>
                         @endif 
                         </td>

                          <td class="text-left">{{ $data->updated_at->diffForHumans() }}</td>


                  <!-- <a href="#" class="btn btn-secondary  btn-sm"><i class="fa fa-download"></i> </a> -->
                  @if(Auth::user()->level == 'admin')
                  <td class="text-center col-md-2" width="10%">
                  <a href="{{route('talenta.laporan', $data->id) }}" class="btn btn-success  btn-sm" title="Download Data" ><i class="fa fa-download"></i></a> 
                  <a href="{{route('talenta.edit', $data->id)}}" class="btn btn-secondary  btn-sm" title="Ubah Data"><i class="fa fa-cog"></i> </a>
                  <button type="button" class="btn btn-danger btn-sm" title="Hapus Data" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>
                  

                  
                  <!-- Modal -->
                  <form method="POST" action="{{ route('talenta.destroy',['id' => $data->id]) }}">
                    <div class="modal fade" id="modalDelete_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                          {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <p>Apakah anda yakin ingin menghapus data pelayanan <b>{{$data->anggota->nama}} - {{ $data->nama_talenta }}</b> ?</p>

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Hapus</button>
                                                   
                            </div>

                        </div>
                      </div>
                    </div>
                  </form>
</td>
                
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