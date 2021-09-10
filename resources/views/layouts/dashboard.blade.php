@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop

@extends('layouts.app')
@section('content')
<div class="row" style="margin-top: 20px;">
@if(Auth::user()->level == 'admin')



    
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics bg-primary">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                    <h5 class="mb-0 text-light">ANGGOTA</h5>
                      
                      <div class="fluid-container">
                        <h1 class="font-weight-medium float-right text-light mb-0"> <b>{{$anggota->count()}}</b></h1>
                      </div>
                    </div>
                  </div>
                  <p class="text-light mt-3 mb-0">
                  <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i>SELURUH ANGGOTA
                  </p>
                </div>
              </div>
            </div>
         
        
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics bg-success">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-light icon-lg"></i>
                    </div>
                    <div class="float-right">
                    <h5 class="mb-0 text-light">JEMAAT</h5>
                      <div class="fluid-container">
                      <h1 class="font-weight-medium float-right text-light mb-0"> <b>{{$anggota->where('sts_anggota', 'Jemaat')->count()}}</b></h1>
                       
                      
                      </div>
                    </div>
                  </div>
                  <p class="text-light mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i>SELURUH JEMAAT
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics bg-warning">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                    <h5 class="mb-0 text-dark">SIMPATISAN</h5>
                      <div class="fluid-container">
                      <h1 class="font-weight-medium float-right text-dark mb-0"> <b>{{$anggota->where('sts_anggota', 'Simpatisan')->count()}}</b></h1>
                      </div>
                    </div>
                  </div>
                  <p class="text-dark mt-3 mb-0">
                    <i class="mdi mdi-chart-arc mr-1" aria-hidden="true"></i>SELURUH SIMPATISAN
                  </p>
                </div>
              </div>
            </div>
        
        

          

            <div class="panel col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div id="daftarAnggota"> </div>
            </div>
          
            <div class="panel col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div id="kelamin"> </div>
            </div>
            
</div>
@else   

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Pemasukan</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh pemasukan
                  </p>
                </div>
              </div>
            </div>
        
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Pengeluaran</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh pengeluaran
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Kategori Transaksi</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh kategori transaksi
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-chart-line text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Transaksi</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-danger mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total seluruh transaksi
                  </p>
                </div>
              </div>
            </div>

            <div class="panel col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div id="daftarAnggota"> </div>
            </div>
@endif

@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script> 
Highcharts.chart('daftarAnggota', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'GEREJA WILAYAH'
    },
    xAxis: {
      categories: [
            'GER-WIL<br/> Tengah <br/> ( {{$anggota->where('gerwil', 'Tengah')->count()}} )',
            'GER-WIL<br/> Timur <br/> ( {{$anggota->where('gerwil', 'Timur')->count()}} )',
            'GER-WIL<br/> Barat <br/> ( {{$anggota->where('gerwil', 'Barat')->count()}} )',
            'GER-WIL<br/> Selatan <br/> ( {{$anggota->where('gerwil', 'Selatan')->count()}} )',
            'GER-WIL<br/> Utara <br/> ( {{$anggota->where('gerwil', 'Utara')->count()}} )',
            'Belum Bergabung <br/> ( {{$anggota->where('gerwil', 'Belum')->count()}} )'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Anggota</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Gereja Wilayah',
        data: [{{$anggota->where('gerwil', 'Tengah')->count()}},{{$anggota->where('gerwil', 'Timur')->count()}}, 
        {{$anggota->where('gerwil', 'Barat')->count()}}, {{$anggota->where('gerwil', 'Selatan')->count()}},
        {{$anggota->where('gerwil', 'Utara')->count()}} , {{$anggota->where('gerwil', 'Belum')->count()}} 
        ] 
    }]
});
</script>
@stop

@section('piechart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('kelamin', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'JENIS KELAMIN'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Pria ( {{$anggota->where('jk', 'Pria')->count()}} )',
            y: {{$anggota->where('jk', 'Pria')->count()}},
            sliced: true,
            selected: true
        }, {
            name: 'Wanita ( {{$anggota->where('jk', 'Wanita')->count()}} )',
            y: {{$anggota->where('jk', 'Wanita')->count()}}
        }]
    }]
});
</script>
@stop


@section('bendahara1')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
Highcharts.chart('daftarBendahara', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Keuangan Tahun Ini'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rupiah (Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} rp</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Pemasukan',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Pengeluaran',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>
@stop