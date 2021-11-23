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
                <a href="{{ route('talenta.create') }}" class="btn btn-primary  btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah Pelayanan</a>
                        </br></br>
             
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            NO
                          </th>
                           <th>
                            NAMA
                          </th>
                          <th>
                            PELAYANAN
                          </th>
                          
                           <th>
                            JK
                          </th>
                          
                          <th>
                            NO HP
                          </th>
                           <th>
                            KETERANGAN
                          </th>
                         <th>
                            STATUS
                          </th> 
                          <th>
                            DATA UPDATE
                          </th> 
                          <th>
                            AKSI
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                      @foreach($talenta as $data)
                      <?php $no++ ;?>
          
                        <tr>
                        <td>{{ $no }}</td>
                          <td> 
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
                          <td>


                  <!-- <a href="#" class="btn btn-secondary  btn-sm"><i class="fa fa-download"></i> </a> -->
                  <a href="{{route('talenta.laporan', $data->id) }}" class="btn btn-success  btn-sm" tooltip ><i class="fa fa-download"></i> Download</a> 
                  <a href="{{route('talenta.edit', $data->id)}}" class="btn btn-secondary  btn-sm"><i class="fa fa-cog"></i> Ubah </a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i> Hapus</button>
                  

                  
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

                            <p>Apakah anda yakin ingin menghapus data <b>{{$data->anggota->nama}}</b> ?</p>

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