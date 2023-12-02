@extends('layouts.main')
@section('title', 'Dashboard Admin')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $jumlah_produk }}</h3>

              <p>Jumlah Semua Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $jumlah_category }}</h3>

              <p>Jumlah Kategori Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $total_harga }}</h3>

              <p>Jumlah Total Harga Semua Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $total_stock }}</h3>

              <p>Jumlah Stok Semua Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Chart 1 -->
                <div class="col-md-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">Total Produk</h4>
                            <p class="card-text"></p>
                            <div id="chartContainer1" style="width:100%; height:400px;"></div>
                            <div class="card-body">
                                <h4 class="card-title">Chart Options</h4>
                                <p class="card-text">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Chart Type
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" id="columnChartBtn1">Column Chart</a>
                                            <a class="dropdown-item" href="#" id="pieChartBtn1">Pie Chart</a>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 2 -->
                <div class="col-md-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">Total Harga Produk</h4>
                            <p class="card-text"></p>
                            <div id="chartContainer2" style="width:100%; height:400px;"></div>
                            <div class="card-body">
                                <h4 class="card-title">Chart Options</h4>
                                <p class="card-text">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Chart Type
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" id="columnChartBtn2">Column Chart</a>
                                            <a class="dropdown-item" href="#" id="pieChartBtn2">Pie Chart</a>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 3 -->
                <div class="col-md-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">Total Stok Produk</h4>
                            <p class="card-text"></p>
                            <div id="chartContainer3" style="width:100%; height:400px;"></div>
                            <div class="card-body">
                                <h4 class="card-title">Chart Options</h4>
                                <p class="card-text">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Chart Type
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" id="columnChartBtn3">Column Chart</a>
                                            <a class="dropdown-item" href="#" id="pieChartBtn3">Pie Chart</a>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- /.content -->
@endsection

@section('script')
<script>
  $(document).ready(function() {
      const produkData = {!! json_encode($produkchart) !!};
      const produkTotalPriceData = {!! json_encode($produkTotalPriceChart) !!};
      const produkTotalStockData = {!! json_encode($produkTotalStockChart) !!};

      function createChart(chartType, containerId, data, title) {
          Highcharts.chart(containerId, {
              chart: {
                  type: chartType
              },
              title: {
                  align: 'center',
                  text: `${title} (${chartType === 'column' ? 'Column' : 'Pie'} Chart)`
              },
              xAxis: {
                  type: 'category'
              },
              yAxis: {
                  title: {
                      text: 'Total'
                  }
              },
              legend: {
                  enabled: false
              },
              tooltip: {
                  headerFormat: '<span style="font-size:11px">{series.name}</span><br>'
              },
              series: [{
                  name: 'Data',
                  colorByPoint: true,
                  data: data.map(item => ({
                      name: item.category_name,
                      y: parseFloat(item.total)
                  }))
              }]
          });
      }

      // Chart 1
      createChart('column', 'chartContainer1', produkData, 'Jumlah produk tiap kategori');

      // Dropdown Chart 1
      $('#columnChartBtn1').on('click', function() {
          createChart('column', 'chartContainer1', produkData, 'Jumlah produk tiap kategori');
      });

      $('#pieChartBtn1').on('click', function() {
          createChart('pie', 'chartContainer1', produkData, 'Jumlah produk tiap kategori');
      });

      // Chart 2
      createChart('column', 'chartContainer2', produkTotalPriceData, 'Jumlah total harga produk tiap kategori');

      // Dropdown Chart 2
      $('#columnChartBtn2').on('click', function() {
          createChart('column', 'chartContainer2', produkTotalPriceData, 'Jumlah total harga produk tiap kategori');
      });

      $('#pieChartBtn2').on('click', function() {
          createChart('pie', 'chartContainer2', produkTotalPriceData, 'Jumlah total harga produk tiap kategori');
      });

      // Chart 3
      createChart('column', 'chartContainer3', produkTotalStockData, 'Jumlah stok produk tiap kategori');

      // Dropdown Chart 3
      $('#columnChartBtn3').on('click', function() {
          createChart('column', 'chartContainer3', produkTotalStockData, 'Jumlah stok produk tiap kategori');
      });

      $('#pieChartBtn3').on('click', function() {
          createChart('pie', 'chartContainer3', produkTotalStockData, 'Jumlah stok produk tiap kategori');
      });
  });
</script>
@endsection