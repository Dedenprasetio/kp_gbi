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



<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                
                        <a href="{{ route('anggota.create') }}" class="btn btn-primary  btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah Anggota</a>
                        <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
                        </ol> 
                      
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th width="1%">NO</th>
                        <th class="text-center">KODE</th>
                       
                        <th class="text-center">NAMA</th>
                        <th class="text-center">JK</th>
                        <th class="text-center">GER-WIL</th>
                        <!-- <th class="text-center">JENIS</th> -->

                        <th class="text-center" >UPDATE</th>
                        
                        @if(Auth::user()->level == 'admin')
                        <th class="text-center col-md-2" width="10%">OPSI</th>
                        @endif
                        </tr>
                        </thead>
                        <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($anggota as $data)
                    <tr>
                      <td class="text-left">{{ $no++ }}</td>
                      <!-- <td>
                      
                          </td> -->
                          <td>
                          @if($data->sts_anggota == 'Jemaat')
                          @if($data->gambar)
                            <img width="50" height="50"src="{{asset('images/anggota', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img  width="50" height="50"src="{{url('images/anggota/default.png')}}" alt="image" style="margin-right: 10px;" />

                          @endif
                          <label class="text-success">{{$data->kode_anggota}}</label>
                          @else($data->sts_anggota == 'Simpatisan')
                          @if($data->gambar)
                            <img width="50" height="50"src="{{asset('images/anggota', $data->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img  width="50" height="50"src="{{url('images/anggota/default.png')}}" alt="image" style="margin-right: 10px;" />

                          @endif
                          <label class="text-warning">{{$data->kode_anggota}}</label>
                          @endif
                          </td>
                          
                     
                          <td class="py-1">
                            {{$data->nama}}
                          </td>

                          <td>
                            {{$data->jk}}
                          </td>
     
                          <td>
                            {{$data->gerwil}}
                          </td>

                      
                      <td class="text-left">{{ $data->updated_at->diffForHumans() }}</td>
                      
                      
                      @if(Auth::user()->level == 'admin')
                      <td class="text-center">
                      <a href="{{ route('anggota.show', $data->id) }}" class="btn btn-primary  btn-sm" tooltip ><i class="fa fa-eye"></i></a> 
                  <a href="{{ route('anggota.laporan', $data->id) }}" class="btn btn-success  btn-sm" tooltip ><i class="fa fa-download"></i></a> 
                  

                  <a href="{{route('anggota.edit', $data->id)}}" class="btn btn-secondary  btn-sm"><i class="fa fa-cog"></i> </a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>
                  
                  

                  
                  <!-- Modal -->
                  <form method="POST" action="{{ route('anggota.destroy',['id' => $data->id]) }}">
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

                            <p>Apakah anda yakin ingin menghapus   <b>{{$data->nama}}</b> ?</p>

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