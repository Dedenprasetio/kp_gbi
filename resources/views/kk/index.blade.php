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
                
                        <a href="{{ route('kk.create') }}" class="btn btn-primary  btn-fw col-lg-2"></i> (+) Kepala Keluarga </a>
                        </br></br>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                        <th>
                            NO
                          </th>
                        <th>
                            Nomor Kepala Keluarga
                          </th>
                          <th>
                            Nama Kepala Keluarga
                          </th>
              
                          <th>
                            ACTION
                          </th>
                        </tr>
                      </thead>
                      
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection