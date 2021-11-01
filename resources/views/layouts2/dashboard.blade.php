@extends('layouts2.app')
@section('content')
<section class="content-header" >
      <div class="container-fluid">
        <div class="row">


 <!--BRADCRAMB AWAL
          <div class="col-sm-6">
  
            <h4>Dashboard</h4>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
-->   
  <!--SALDO AWAL--> 
    <div class="col-md-4 col-sm-4 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fa fa-plus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pemasukan</span>
        <h5 class="info-box-number text-dark ">{{ "Rp. ".number_format($seluruh_pemasukan->total)." ,-" }}</h5>
        <div class="progress">
          <div class="progress-bar bg-success" style="width: 100%"></div>
        </div>
        <span class="progress-description">
       Semua
        </span>
      </div>
    </div>
    </div>

    

  <!--PENGELUARAN--> 
  <div class="col-md-4 col-sm-4 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-warning"><i class="fa fa-minus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pengeluaran</span>
        <h5 class="info-box-number text-dark ">{{ "Rp. ".number_format($seluruh_pengeluaran->total)." ,-" }}</h5>
        <div class="progress">
          <div class="progress-bar bg-warning" style="width: 100%"></div>
        </div>
        <span class="progress-description">
       Semua
        </span>
      </div>
    </div>
    </div>

     <!--SALDO SEKARANG-->
 <div class="col-md-4 col-sm-4 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="fa fa-credit-card"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Saldo Sekarang</span>
        <h5 class="info-box-number text-dark ">{{ "Rp. ".number_format($seluruh_pemasukan->total -= $seluruh_pengeluaran->total)." ,-" }}</h5>
        <div class="progress">
          <div class="progress-bar bg-danger" style="width: 100%"></div>
        </div>
        <span class="progress-description">
       Semua
        </span>
      </div>
    </div>
    </div>
 

      <!--GRAFIK 1-->
<div class="col-md-6 col-sm-6 col-12 ">
    <div class="info-box" >
    <div class="card col-12"  >
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h5  class="position-center ">Grafik Keuangan <b>Per Bulan</b> Tahun {{date('Y')}} </h5>
                <!--  
                <a href="javascript:void(0);"> Tahun {{date('Y')}}</a>
                -->
                </div>
              </div>

              <div class="position-relative ">
                <canvas id="grafik1"></canvas>
                </div>



              <div class="mb-12">
                  <div class="table-responsive">
                  <table class="table">

                <tr> 
                <th width="25%"> <i class="fas fa-square text-info"></i> Pemasukan</th>
                <th width="2%" class="text-left">:</th>

                <td class="text-left">
                      <h6 class="info-box-number text-dark"><b>{{ "Rp. ".number_format($pemasukan_bulan_ini->total)." ,-" }}</b></h6>
                </td>
                
                </tr>

              
                  <tr>
                    <th width="25%"> <i class="fas fa-square text-secondary"></i> Pengeluaran</th>
                    <th width="2%" class="text-center">:</th>
                          
                    <td class="text-left">
                    <h6 class="info-box-number text-dark"> <b>{{ "Rp. ".number_format($pengeluaran_bulan_ini->total)." ,-" }}</b></h6>
                      
                    </td>
                
                  </tr>   
                 </table>
                  </div>
              </div>

              
    </div>          
    </div>          
</div>


      <!--GRAFIK 2-->


      <div class="col-md-6 col-sm-6 col-12">
    <div class="info-box">
    <div class="card col-12">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h5  class="position-center ">Grafik Keuangan <b>Per Tahun</b>  </h5>
                <!--  
                <a href="javascript:void(0);"> Tahun {{date('Y')}}</a>
                -->
                </div>
              </div>

              <div class="position-relative ">
                <canvas id="grafik2"></canvas>
                </div>



              <div class="mb-12">
                  <div class="table-responsive">
                  <table class="table">

                <tr> 
                <th width="25%"> <i class="fas fa-square text-info"></i> Pemasukan</th>
                <th width="2%" class="text-left">:</th>

                <td class="text-left">
                      <h6 class="info-box-number text-dark"><b>{{ "Rp. ".number_format( $semua_pemasukan->total)." ,-" }}</b></h6>
                </td>
                
                </tr>

              
              <tr>
                <th width="25%"> <i class="fas fa-square text-secondary"></i> Pengeluaran</th>
                <th width="2%" class="text-center">:</th>
                      
                <td class="text-left">
                <h6 class="info-box-number text-dark"> <b>{{ "Rp. ".number_format($semua_pengeluaran->total)." ,-" }}</b></h6>
                  
                </td>
            
              </tr>   
              </table>
                  </div>
              </div>

              
    </div>          
    </div>          
</div>





 <!--GRAFIK 4-->
<div class="col-md-12 col-sm-12 col-12">
      <div class="info-box">
      
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              
              <div class="card-header">
              <h5  class="position-center ">Grafik Keuangan</h5>
             
              <div class="col-sm-12 float-sm-right">
                
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
            </ol>
          </div>
          <!-- CLOSE 
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                 
                </div>
 -->

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                <div class="col-md-6">
                    <p class="text-center">
                      <strong>Grafik Keuangan <b>Per Kategori</b></strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                     <canvas id="grafik3"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>






                
                  <div class="col-md-6">
                    <p class="text-center">
                      <strong>Grafik Keuangan <b>Per kas</b></strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                     <canvas id="grafik4"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
              
                  
                  
               
                </div>
     
              </div>
              <!-- ./card-body -->
              
             <!--
              <div class="card-footer">
                <div class="row">


                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                    <span class="description-text text-info"><i class="fas fa-square text-info"></i> PEMASUKAN KATEGORI</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pemasukan_tahun_ini->total)." ,-" }}</h5>            
                    </div>          
                  </div>
                  
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                    <span class="description-text text-secondary"><i class="fas fa-square text-secondary"></i> PENGELUARAN KATEGORI</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pengeluaran_tahun_ini->total)." ,-" }}</h5>   
                    </div>
                  </div>

                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                    <span class="description-text text-info"><i class="fas fa-square text-info"></i>PEMASUKAN kas</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pemasukan_tahun_ini->total)." ,-" }}</h5>            
                    </div>          
                  </div>
                  
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                    <span class="description-text text-secondary"><i class="fas fa-square text-secondary"></i> PENGELUARAN kas</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pengeluaran_tahun_ini->total)." ,-" }}</h5>   
                    </div>
                  </div>




                </div>
             



              </div>
             -->

            </div>
          
          </div>
       
      

      </div>
    </div>
 



</div>

</div>

        


        </div>
      </div><!-- /.container-fluid -->
    </section>


<!--SECTION
      -->
      
<script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*500)};

  var barChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgb(52, 152, 219)",
      strokeColor : "rgb(37, 116, 169)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $tahun = date('Y');
        $pemasukan_perbulan = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pemasukan')
        ->whereMonth('tanggal',$bulan)
        ->whereYear('tanggal',$tahun)
        ->first();
        $total = $pemasukan_perbulan->total;
        if($pemasukan_perbulan->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      fillColor : "rgb(171, 183, 183)",
      strokeColor : "rgb(149, 165, 166)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(151,187,205,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $tahun = date('Y');
        $pengeluaran_perbulan = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pengeluaran')
        ->whereMonth('tanggal',$bulan)
        ->whereYear('tanggal',$tahun)
        ->first();
        $total = $pengeluaran_perbulan->total;
        if($pengeluaran_perbulan->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    }
    ]

  }

  var barChartData2 = {
    labels : [
    <?php 
    $thn2 = DB::table('transaksi')
    ->select(DB::raw('year(tanggal) as tahun'))
    ->distinct()
    ->orderBy('tahun','asc')
    ->get();
    foreach($thn2 as $t){
      ?>
      "<?php echo $t->tahun; ?>",
      <?php 
    }
    ?>
    ],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgb(52, 152, 219)",
      strokeColor : "rgb(37, 116, 169)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      foreach($thn2 as $t){
        $thn = $t->tahun;
        $tahun = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pemasukan')
        ->whereYear('tanggal',$thn)
        ->first();
        $total = $tahun->total;
        if($tahun->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      fillColor : "rgb(171, 183, 183)",
      strokeColor : "rgb(149, 165, 166)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(254, 29, 29, 0)",
      data : [
      <?php
      foreach($thn2 as $t){
        $thn = $t->tahun;
        $tahun = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pengeluaran')
        ->whereYear('tanggal',$thn)
        ->first();
        $total = $tahun->total;
        if($tahun->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    }
    ]

  }



  var barChartData3 = {
    labels : [
    @foreach($kategori as $k)
    "{{ $k->kategori }}",
    @endforeach
    ],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgb(52, 152, 219)",
      strokeColor : "rgb(37, 116, 169)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      @foreach($kategori as $k)
      <?php 
      $id_kategori = $k->id;
      $pemasukan_perkategori = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pemasukan')
      ->where('kategori_id',$id_kategori)
      ->first();
      $total = $pemasukan_perkategori->total;
      if($pemasukan_perkategori->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    },{
      label: 'Pengeluaran',
      fillColor : "rgb(171, 183, 183)",
      strokeColor : "rgb(149, 165, 166)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(254, 29, 29, 0)", 
      data : [
      @foreach($kategori as $k)
      <?php 
      $id_kategori = $k->id;
      $pengeluaran_perkategori = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pengeluaran')
      ->where('kategori_id',$id_kategori)
      ->first();
      $total = $pengeluaran_perkategori->total;
      if($pengeluaran_perkategori->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    }
    ]

  }


  var barChartData4 = {
    labels : [
    @foreach($kas as $k)
    "{{ $k->kas }}",
    @endforeach
    ],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgb(52, 152, 219)",
      strokeColor : "rgb(37, 116, 169)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      @foreach($kas as $k)
      <?php 
      $id_kas = $k->id;
      $pemasukan_perkas = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pemasukan')
      ->where('kas_id',$id_kas)
      ->first();
      $total = $pemasukan_perkas->total;
      if($pemasukan_perkas->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    },{
      label: 'Pengeluaran',
      fillColor : "rgb(171, 183, 183)",
      strokeColor : "rgb(149, 165, 166)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(254, 29, 29, 0)", 
      data : [
      @foreach($kas as $k)
      <?php 
      $id_kas = $k->id;
      $pengeluaran_perkas = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pengeluaran')
      ->where('kas_id',$id_kas)
      ->first();
      $total = $pengeluaran_perkas->total;
      if($pengeluaran_perkas->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    }
    ]

  }



  window.onload = function(){
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

    var ctx = document.getElementById("grafik2").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData2, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

   var ctx = document.getElementById("grafik3").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData3, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

   

    var ctx = document.getElementById("grafik4").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData4, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

  }





</script>



@endsection
