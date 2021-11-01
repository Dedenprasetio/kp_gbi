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
                
                <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nama Kepala Keluarga : <b>{{$data->anggota->nama}}</b></label>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nomor Kartu Keluarga : <b>{{$data->nomor_kk}}</b></label>
                                    </div>
                                </div>
                      
                            </div>
                            <br>
                            
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
                            PERAN KELUARGA
                          </th>
                          {{-- <th>
                            ACTION
                          </th> --}}
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                      @foreach($det as $data)
                     
                          
                     
                      <?php $no++ ;?>
                      
                        <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->nama }}</td>    
                        <td>{{ $data->sts_dlm_klrg }}</td>   
                        {{-- <td>
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

                                        <p>Apakah anda yakin ingin menghapus data <b>{{$data->nama}}</b> ?</p>

                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane m-r-5"></i> Hapus</button>
                                                              
                                        </div>

                                        
                                    </div>
                                  </div>
                                </div>
                                
                              </form>
                        </td>    --}}
                         
                        @endforeach
                              
                                    </div>
                                  </div>
                                </div>
                              

                              </td>
                        </tr>
                     
                      </tbody>
                    </table>
                    </br>
                    <a href="{{route('kk.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection