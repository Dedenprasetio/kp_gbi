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
<div class="row">

                        
                  <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>



<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">

                <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Kartu Keluarga</li>
                        </ol> 
                        </br></br>
                
                        <a href="{{ route('kk.create') }}" class="btn btn-primary  btn-fw col-lg-2"> <i class="fa fa-plus"></i> Kartu Keluarga </a>
                        </br></br>
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                        <th width="1%">NO</th>
                        <th class="text-center">STATUS</th>
                       
                        <th class="text-center">NOMOR KARTU KELUARGA</th>
                        <th class="text-center">NAMA KEPALA KELUARGA</th>

                        
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
                      @foreach($datas1 as $data)
          
                        <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td class="text-center">
                        @if($data->sts_istri == 1) 
                              <a href="/detailkk/status/istri/{{ $data->id }}" class="btn btn-success  btn-sm">  Sudah Ada Istri </a>
                              @elseif($data->sts_istri == 0)
                              <a href="/detailkk/status/istri/{{ $data->id }}" class="btn btn-danger  btn-sm">  Belum Ada Istri </a>
                              @endif
                        </td>
                        <td> 
                            {{$data->nomor_kk}}
                          </td>
                          
                          <td> 
                              {{$data->anggota->nama}}
                          </td>

                          <!-- <td class="col-md-2"> 
                              @if($data->sts_istri == 0)
                              <a href="/detailkk/create/istri/{{ $data->id }}" class="btn btn-success  btn-sm"> <i class="fa fa-plus"></i> Tambah Istri </a>
                              @elseif($data->sts_istri == 1)
                              <a href="#" class="btn btn-danger  btn-sm"> Terisi </a>
                              @endif
                          </td>
       -->
                          
                     
                         
                          <td class="text-center">
                          <div class="py-1">
                          <a type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-download"></i> 
                          </a>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('laporan.pernikahan_pdf', $data->id) }}"> Buku Pernikahan  </a>
                            
                            <a class="dropdown-item" href="{{route('laporan.kk_pdf', $data->id) }}"> Kartu Keluarga </a>
             
                          </div>
                        </div>
                        <div>
                          
                          <a href="/detailkk/index/{{ $data->id }}" class="btn btn-warning  btn-sm" > <i class="fa fa-list-alt" aria-hidden="true"></i></a>
                         <!-- <a href="{{ route('kk.edit', $data->id) }}" class="btn btn-secondary  btn-sm" tooltip ><i class="fa fa-download"></i> </a> -->
                              {{-- <a href="{{route('kk.edit', $data->id)}}" class="btn btn-secondary  btn-sm"><i class="fa fa-cog"></i> </a> --}}
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i> </button>



                              <!-- Modal -->
                              <form method="POST" action="{{ route('kk.destroy',['id' => $data->id]) }}">
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

                                        <p>Apakah anda yakin ingin menghapus data kepala keluarga dari</p>
                                        <p><b>{{$data->anggota->nama}}</b> ?</p>

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