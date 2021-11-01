@extends('layouts2.app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row">



    
<!--SALDO AWAL-->




    <div class="col-md-6 col-sm-6 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fa fa-download"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Saldo Awal</span>
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

    
  <!--SALDO AKHIR-->
  <div class="col-md-6 col-sm-6 col-12">
      <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="	fa fa-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Saldo Akhir</span>
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


    <div class="col-md-12 col-sm-12 col-12">
      <div class="info-box">
      
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
              <h5  class="position-center ">Grafik Keuangan <b>Per Bulan</b> Tahun Ini </h5>
             
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- CLOSE 
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Tahun: {{date('Y')}}</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                     <canvas id="grafik1"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Add Products to Cart
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Complete Purchase
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Visit Premium Page</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Send Inquiries
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-6 col-6">
                    <div class="description-block border-right">
                    <span class="description-text text-success">TOTAL PEMASUKAN</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pemasukan_bulan_ini->total)." ,-" }}</h5>
                     
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  
                  <!-- /.col -->
                  <div class="col-sm-6 col-6">
                    <div class="description-block">
                    <span class="description-text text-danger">TOTAL PENGELUARAN</span>
                    <h5 class="description-header">{{ "Rp. ".number_format(  $pengeluaran_bulan_ini->total)." ,-" }}</h5>
                     
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      

      </div>
    </div>


  <!--GRAFIK 4-->
  <div class="col-md-12 col-sm-12 col-12">
    <div class="info-box">
    <div class="card col-12">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h5  class="position-center ">Grafik Keuangan <b>Per Kategori</b>  </h5>
                <!--  
                <a href="javascript:void(0);"> Tahun {{date('Y')}}</a>
                -->
                </div>
              </div>

              <div class="position-relative ">
                <canvas id="grafik4"></canvas>
              </div>

              <div class="position-relative ">
              <div class="table-responsive">
                    <table class="table">
                         
                    </table>
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
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgba(25, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
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
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(248, 5, 5, 0.8)",
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
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
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
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(248, 5, 5, 0.8)",
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

  
  var barChartData4 = {
    labels : [
    @foreach($kas as $k)
    "{{ $k->kas }}",
    @endforeach
    ],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
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
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(248, 5, 5, 0.8)",
      highlightFill : "rgba(151,187,205,0.75)",
      highlightStroke : "rgba(254, 29, 29, 0)", 
      data : [
      @foreach($kas as $k)
      <?php 
      $bln = date('m');
      $id_kas = $k->id;
      $pemasukan_perkas = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pengeluaran')
      ->where('kas_id',$id_kas)
      ->whereMonth('tanggal',$bln)
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
    }
    ]

  }




  window.onload = function(){
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 5,
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
