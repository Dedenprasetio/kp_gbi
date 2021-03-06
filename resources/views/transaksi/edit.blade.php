@section('js')

<script type="text/javascript">
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("acara_judul").value = $(this).attr('data-acara_judul');
                document.getElementById("acara_id").value = $(this).attr('data-acara_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_pembayaran', function (e) {
                document.getElementById("pembayaran_id").value = $(this).attr('data-pembayaran_id');
                document.getElementById("pembayaran_nama").value = $(this).attr('data-pembayaran_nama');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

</script>

@stop

@section('css')

@stop

@extends('layouts2.app')

@section('content')
<form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<section class="content-header">
  <div class="container-fluid">
    <div class="row">



              <div class="col-sm-6">
                  <h4>Form Tambah Transaksi</h4> 
              </div>

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active"><a href="/transaksi">Transaksi</a></li>
                  <li class="breadcrumb-item active">Tambah Transaksi</li>
                </ol>
              </div>
          

              <div class=" table-responsive col-md-6 col-sm-12 col-12"> 
             
              <!--area ditambah-->   
              <!--area diisi-->         
                    <div class="card card-secondary">
                      <div class="card-body">
                  
                                <!--area ditambah   -->
                              
                                              <div class="form-group{{ $errors->has('nama_pengguna') ? ' has-error' : '' }}">
                                                    
                                                    <label for="nama_pengguna" class="col-md-7 control-label">Nama Pengguna <b style="color:Tomato;">*</b> </label>
                                                    <div class="col-md-12">
                                                        <input id="nama_pengguna" type="text" class="form-control" name="nama_pengguna" value="{{ $nama }}" readonly="">
                                                        @if ($errors->has('nama_pengguna'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('nama_pengguna') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                                                    
                                                    <label for="kode_transaksi" class="col-md-7 control-label">Nama Pengguna <b style="color:Tomato;">*</b> </label>
                                                    <div class="col-md-12">
                                                        <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" readonly="">
                                                        @if ($errors->has('kode_transaksi'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                                  
                                              
                                                <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                                                  <label>Tanggal <b style="color:Tomato;">*</b></label>
                                                  <input type="date" class="form-control datepicker2 py-0" required="required" name="tanggal" value="{{ $transaksi->tanggal }}" style="width: 100%">
                                                </div>

                                                <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                                                  <label>Jenis <b style="color:Tomato;">*</b></label>
                                                  <select class="form-control py-0" required="required" name="jenis" style="width: 100%">
                                                    <option value="">Pilih</option>
                                                    <option {{ ($transaksi->jenis == "Pemasukan" ? "selected='selected'" : "") }} value="Pemasukan">Pemasukan</option>
                                                    <option {{ ($transaksi->jenis == "Pengeluaran" ? "selected='selected'" : "") }} value="Pengeluaran">Pengeluaran</option>
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                                                  <label>Kategori <b style="color:Tomato;">*</b></label>
                                                  <select class="form-control py-0" required="required" name="kategori" style="width: 100%">
                                                    <option value="">Pilih</option>
                                                    @foreach($kategori as $k)
                                                    <option {{ ($transaksi->kategori->id == $k->id ? "selected='selected'" : "") }}  value="{{ $k->id }}">{{ $k->kategori }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                                                  <label>Pembayaran <b style="color:Tomato;">*</b></label>
                                                  <select class="form-control py-0" required="required" name="pembayaran" style="width: 100%">
                                                    <option value="">Pilih</option>
                                                    @foreach($pembayaran as $k)
                                                    <option {{ ($transaksi->pembayaran->id == $k->id ? "selected='selected'" : "") }}  value="{{ $k->id }}">{{ $k->pembayaran }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                                                  <label>Nominal <b style="color:Tomato;">*</b></label>
                                                  <input type="number" class="form-control py-0" required="required" name="nominal" value="{{ $transaksi->nominal }}" style="width: 100%">
                                                </div>

                                
                                                
                                              

                      </div>
                    </div>

                    
              </div>

              <div class=" table-responsive col-md-6 col-sm-12 col-12"> 
             
              <!--area ditambah-->   
              <!--area diisi-->         
                    <div class="card card-secondary">
                      <div class="card-body">
                  
                                <!--area ditambah   --> 
                              
                 
                           
                            
                            <div class="form-group col-md-12">
                            <label for="cover" class="col-md-12 control-label">Bukti Transaksi <i>(kosongkan jika tidak ada)</i> </label>
                            <div class="col-md-6">
                           
                                <img width="360" height="360" @if($transaksi->cover) src="{{ asset('images/Transaksi/'.$transaksi->cover) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                            </div>


                            <div class="form-group col-md-12" style="width: 100%;margin-bottom:20px">
                              <label>Keterangan</label>
                              <textarea class="form-control py-0" name="keterangan"  autocomplete="off" placeholder="Masukkan keterangan (Opsional) .." style="width: 100%">{{ $transaksi->keterangan }}</textarea>
                            </div>
                                                                    
                                

                                <div class="form-group col-md-12">
                                
                                  <button type="submit" class="btn btn-success col-md-2 float-right" id="submit" >
                                                      Submit
                                  </button>


                                         

                                  &nbsp;
                                  <button type="reset" class="btn btn-danger col-md-4float-left">
                                                                Reset
                                  </button>
                                  
                                 
                                </div>
                                

                      </div>
                    </div>

                    
              </div>


    </div>
  </div><!-- /.container-fluid -->
</section>
</form>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Donatur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                  <th width="1%">NO</th>
                  <th class="text-center">METODE PEMBAYARAM</th>
                  <th class="text-center" >UPDATE</th>
              
                  </tr>
                      </thead>
                      <tbody>
              @php
              $no = 1;
              @endphp
              @foreach($pembayaran as $k)
              <tr>
                <td class="text-left">{{ $no++ }}</td>
                <td>{{ $k->pembayaran }}</td>
                <td class="text-left">{{ $k->updated_at }}</td>
               
              </tr>
              @endforeach
            </tbody>
                        </table>  
                  </div>
                </div>
            </div>
</div>           
  
@endsection


