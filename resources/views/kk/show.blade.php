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
                
                <div class="row">
                                <!-- <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nama Kepala Keluarga : <b></b></label>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-0">
                                        <label class="control-label">Nomor Kartu Keluarga : <b></b></label>
                                        
                                        
                                    </div>
                                </div>
                                 -->
                            </div>
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
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no = 0;?>
                      @foreach($det as $data)
                 
                      <?php $no++ ;?>
                      
                        <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->anggota->nama }}</td>    
                        <td>{{ $data->anggota->sts_dlm_klrg }}</td>   
                        @endforeach
                        
                                             
                          

                              

                        

                                    </div>
                                  </div>
                                </div>
                              

                              </td>
                        </tr>
                     
                      </tbody>
                    </table>
                    <a href="{{route('kk.index')}}" class="btn btn-light pull-right">Back</a>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection