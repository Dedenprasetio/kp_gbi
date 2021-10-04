@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

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

                
                @foreach($kk as $data)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nama Kepala Keluarga : {{ $data->anggota->nama }}</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nomor Kartu Keluarga : {{ $data->nomor_kk }}</label>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        

                
                        <a href="{{ route('detailkk.create') }}" class="btn btn-primary  btn-fw col-lg-2"></i> (+) Detail Keluarga </a>
                        </br></br>
                  <div class="table-responsive">
                  <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            NO
                          </th>
                           <th>
                            KODE ANGGOTA
                          </th>
                          <th>
                            NAMA 
                          </th>
                          <th>
                            STATUS HUBUNGAN KELUARGA
                          </th>
                          <th>
                            ACTION
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                     @foreach($det as $data) 
                      <?php $no++ ;?>
          
                        <tr>
                        <td>{{ $no }}</td>
                          <td> 
                              {{ $data->anggota->kode_anggota}}
                          </td>
                          <td> 
                            {{ $data->anggota->nama }}
                          </td>
                            
                          <td> 
                          {{ $data->anggota->sts_dlm_klrg }}
                          </td>
                         
                          <td>
                              

                              
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>



                              <!-- Modal -->
                              <form method="POST" action="{{ route('detailkk.destroy',['id' => $data->id]) }}">
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
          <a href="{{route('kk.index')}}" class="btn btn-light pull-right" style="background-color:white">Kembali</a>
          
@endsection