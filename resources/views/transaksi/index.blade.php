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

  <div class="content-header">
      <div class="container-fluid">
        <div class="row">

        <div class="col-md-12 col-sm-12 col-12">
            <div class="col-sm-12">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary  btn-fw col-lg-2"><i class="fa fa-plus"></i> Tambah Transaksi</a>         
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
              </ol>
            </div>
        </div>    


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

<section class="content-header">

  <div class="container-fluid">
    <div class="row">

  

                  <!-- MODAL NOTIFIKASI -->
                  <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
                  </div>
          

          <!-- BUKA TABEL -->
     
          <div class=" table-responsive col-md-12 col-sm-6 col-12">
                   
             <!--area diisi-->
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th width="1%">NO</th>
                  <th class="text-center col-md-1" >KODE</th>
                  <th class="text-center col-md-1" >PENGGUNA</th> 
                  
                  <th class="text-center col-md-2" >KATEGORI</th>
                  <th class="text-center col-md-1" >PEMBAYARAN</th>
                  <th class="text-center col-md-1">PEMASUKAN</th>
                  <th class="text-center col-md-1">PENGELUARAN</th>
                  <th class="text-center col-md-1">UPDATE</th>
                  <th class="text-center col-md-2" width="10%">OPSI</th>
                  </tr>
                  </thead>
                  <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($transaksi as $t)
              <tr>
                <td class="text-left">{{ $no++ }}</td>

                @if($t->jenis == 'Pemasukan') 
                        <td class="text-center">
                        <a href="{{route('transaksi.show', $t->id)}}" class="text-blue"> 
                                      <b>
                                        <u> 
                                        {{ $t->kode_transaksi }}
                                        </u>
                                      </b>
                        </a>  
                        </td>
                        @else
                        <td class="text-center" >
                        <a href="{{route('transaksi.show', $t->id)}}" class="text-blue"> 
                                      <b> 
                                      <u> 
                                        {{ $t->kode_transaksi }}
                                        </u>
                                      </b>
                        </a>  
                        </td>
                @endif
                <td class="text-left">{{ $t->nama_pengguna }}</td>
                           
                <td class="text-left">{{ $t->kategori->kategori }}</td>
                <td class="text-left">{{ $t->pembayaran->pembayaran }}</td>
                
                <td class="text-left">
                  @if($t->jenis == "Pemasukan")
                  {{ "Rp.".number_format($t->nominal).",-" }}
                  @else 
                  {{ "-" }}
                  @endif
                </td>
                <td class="text-left">
                  @if($t->jenis == "Pengeluaran")
                  {{ "Rp.".number_format($t->nominal).",-" }}
                  @else
                  {{ "-" }}
                  @endif
                </td>
                <td class="text-left">{{ $t->updated_at->diffForHumans() }}</td>

                <td class="text-center col-md-1">    

                <a href="{{route('transaksi.edit', $t->id)}}" class="btn btn-secondary btn-sm col-md-5 text-center">
                  <i class="fas fa-edit  text-center"></i> Edit
                </a>
                <a  data-toggle="modal" data-target="#modalDelete_{{ $t->id }}" class="btn btn-danger btn-sm col-md-5 text-center">
                  <i class="fas fa-trash  text-center"></i> Hapus
                </a>
                
                  <!-- 
                    <a href="{{route('transaksi.edit', $t->id)}}" class="btn btn-secondary  btn-sm"><i class="fa fa-cog"></i> </a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{ $t->id }}"><i class="fa fa-trash"></i></button>
                  -->
               
                  
                  <!-- Modal -->
                  <form method="POST" action="{{ route('transaksi.destroy',['id' => $t->id]) }}">
                    <div class="modal fade" id="modalDelete_{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                            <p>Apakah anda yakin ingin menghapus data <b>{{$t->transaksi}}</b> ?</p>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>
                            
                            
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash m-r-5"></i> Hapus</button>
                                                   
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
             <!-- </div>
               /.card-body -->
          </div>

          <!-- TUTUP TABEL -->

    </div>
  </div><!-- /.container-fluid -->

</section>

@endsection


