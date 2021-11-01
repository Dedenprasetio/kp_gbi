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


<section class="content-header">
      <div class="container-fluid">
        <div class="row">



<div class="col-sm-6">


      </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="/transaksi">Transaksi</a></li>
              <li class="breadcrumb-item active">{{$transaksi->kategori->kategori}}</li>
            </ol>
          </div>
          


     
          <div class=" table-responsive col-md-12 col-sm-6 col-12">
          
            
             <!--area ditambah-->   
<!--area diisi-->         
<div class="card card-secondary">
  <div class="card-body">
    
  <div class="align-items-center">

    
        <div class="col-lg-6 mx-auto">
       
        <div class="col-md-4 d-flex align-items-center grid-margin " >
              <div class="row flex-grow">
                <div class="col-12 ">
                  <div class="card">
                    <div class="card-body">
                      
                      <form class="forms-sample">
                    
                   <h4 class="col-md-12" ><b>{{$transaksi->kategori->kategori}}</b></h4>
                      
                      
          
                            </br>
                            <div class="col-md-12">
                            <img width="400" height="400" @if($transaksi->cover) src="{{ asset('images/Transaksi/'.$transaksi->cover) }}" @endif />
                            </div>
                            </br>
                        
                            
                    

                      
                         

                    </div>
                  </div>
                </div>
              </div>
        </div>

        







        
        </div>

      </div>
</div>
</div>
                     
</div>
</div>

        


        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection


