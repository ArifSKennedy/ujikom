@extends('layouts.master')
@section('title')
    Dashboard
@endsection

{{-- @section('breadcrumb')
     @parent
     <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
    </li>
@show --}}

@section('content')

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cube"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Kategori</span>
          <span class="info-box-number">
            {{ $kategori }}
          </span>
          <a href="{{ route('kategori.index') }}"><span class="info-box-text">Klik</span></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cubes"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Produk</span>
          <span class="info-box-number">{{ $produk }}</span>
          <a href="{{ route('produk.index') }}"><span class="info-box-text">Klik</span></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-truck"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Supplier</span>
          <span class="info-box-number">{{ $supplier }}</span>
          <a href="{{ route('supplier.index') }}"><span class="info-box-text">Klik</span></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Member</span>
          <span class="info-box-number">{{ $member }}</span>
          <a href="{{ route('member.index') }}"><span class="info-box-text">Klik</span></a>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
             

              {{-- <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
              </div> --}}
              <div class="card-body">
                <div id="chart-pendapatan">
                </div>
            </div>
              <!-- /.chart-responsive -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection



@push('scripts')
<!-- ChartJS -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    function idrCurency(number)
    {
        return parseInt(number).toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });
    }
    console.log(idrCurency(1000000));
    
    $(function() {
    Highcharts.setOptions({

    lang: {
        decimalPoint: ',',
        thousandsSep: '.'
    }

    });
    Highcharts.chart('chart-pendapatan', {
        chart: {
            type: 'column'
        },
        labels:{
            
            formatter : idrCurency(10)
        },

        title: {
            text: 'Laporan Pendapatan'
        },

        xAxis: {
            categories: {{ json_encode($data_tanggal) }},
            crosshair: true
        },
        yAxis: {
            title: {
                text: 'Rupiah'
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:10px">{series.name}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">Rp.</td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
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
            name: 'Total Pendapatan',
            data: [{{ implode(',', $data_pendapatan) }}]
        
        }]
        
    });
    });        
</script>


@endpush