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

                        
            
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">

                <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/kk">Data Kartu Keluarga</a></li>
                        <li class="breadcrumb-item active">Detail Kartu Keluarga</li>
                        </ol> 
                        </br></br>

                <a href="/detailkk/create/{{ $data->id }}" class="btn btn-primary  btn-fw col-lg-2"> <i class="fa fa-plus"></i> Anggota Keluarga </a>
                
                <br>
               
                <br>
                <div class="row">
                  <!-- SESSION -->
@if (Session::has('message'))
                        <div class="alert alert-success alert-block alert-{{ Session::get('message_type') }}">
                          <button type="button btn-light" class="close" data-dismiss="alert">×</button>    
                            <strong>{{ Session::get('message') }}</strong>
                        </div>
                      @endif
                        <!-- END SESSION -->
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nama Kepala Keluarga : <b>{{$data->anggota->nama}}</b></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            
                         
                            <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                      @foreach($istri as $is)
                                        <label class="control-label">Nama Istri : <b>{{ $is->nama }}</b></label>
                                      @endforeach
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
                  <table id="example1" class="table table-bordered table-striped">

                  <thead>
                        <tr>
                        <th width="1%">NO</th>
                        <th class="text-center">NAMA</th>
                       
                        <th class="text-center">PERAN KELUARGA</th>
                        

                        
                        <th class="text-center">AKSI</th>

                        </tr>
                        </thead>

                    
                      <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($det as $data)
                      
                        <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->sts_dlm_klrg }}</td>   
                         <td class="text-center">
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $data->id }}"><i class="fa fa-trash"></i></button>



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
                        </td>    
                        
                        @endforeach
                              
                                    </div>
                                  </div>
                                </div>
                              

                              </td>
                        </tr>
                     
                      </tbody>
                    </table>
                    </br>
                    <a href="{{route('kk.index')}}" class="btn btn-light pull-right">Kembali</a>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection