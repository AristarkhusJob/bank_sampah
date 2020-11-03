<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sampah Untuk Sekolah</title>
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/css/style.css">
    <link rel="shortcut icon" href="../assets/dashboardAssets/images/favicon.png"/>

	<script src="../assets/dashboardAssets/js/chart.bundle.min.js"></script>

  </head>
  <body>
    <div class="container-scroller">

		@include('header')

        <div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Total Harga Sampah Per Bulan</h4>
									<canvas id="priceChart"></canvas>
								</div>
							</div>
						</div>
						<div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Total Berat Sampah Per Bulan</h4>
									<canvas id="weightChart"></canvas>
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<span class="card-title">Ratio Sampah Tahun</span>
                                    <span class="card-title" id="currentYear"></span>
                                    <span class="card-title">Per Kg</span>
									<canvas id="categoryCurrentYear"></canvas>
								</div>
							</div>
						</div>
                        <div class="col-lg-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <span class="card-title">Ratio Sampah Tahun</span>
                                    <span class="card-title" id="lastYear"></span>
                                    <span class="card-title">Per Kg</span>
									<canvas id="categoryLastYear"></canvas>
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <form class="forms-sample" method="GET" action="{{route('exportExcelAll')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="card-title text-dark col-sm-3 col-form-label">Jurnal Umum Semua Data</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="allCategory">
                                                        <option value="" disabled selected>Pilih Kategori Sampah</option>
                                                        <option value="all">Semua</option>
                                                        @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary btn-icon-text" type="submit">
                                                        <i class="mdi mdi-download"></i>
                                                        Download</button>
                                                    </div>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('allCategory') }}</small>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="forms-sample" method="GET" action="{{route('exportExcelYear')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="card-title text-dark col-sm-3 col-form-label">Jurnal Umum Per Tahun</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="yearCategory">
                                                        <option value="" disabled selected>Pilih Kategori Sampah</option>
                                                        <option value="all">Semua</option>
                                                        @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="number" name="yearLaporan" class="form-control" placeholder="Masukkan Tahun . . ." autocomplete="off">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary btn-icon-text" type="submit">
                                                        <i class="mdi mdi-download"></i>
                                                        Download</button>
                                                    </div>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('yearCategory') }}</small>
                                                <small class="text-danger">{{ $errors->first('yearLaporan') }}</small>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="forms-sample" method="GET" action="{{route('exportExcelMonthYear')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="card-title text-dark col-sm-3 col-form-label">Jurnal Umum Per Bulan</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="monthYearCategory">
                                                        <option value="" disabled selected>Pilih Kategori Sampah</option>
                                                        <option value="all">Semua</option>
                                                        @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-control" name="month">
                                                        @if(old('month'))
                                                        <option value="{{ old('month') }}" selected>{{ old('month') }}</option>
                                                        @else
                                                        <option value="" disabled selected>Masukkan Bulan . . .</option>
                                                        @endif
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>
                                                    <input type="number" class="form-control" value="{{ old('year') }}" name="year" placeholder="Masukkan Tahun . . ." autocomplete="off">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary btn-icon-text" type="submit">
                                                        <i class="mdi mdi-download"></i>
                                                        Download</button>
                                                    </div>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('monthYearCategory') }}</small>
                                                <small class="text-danger">{{ $errors->first('month') }}</small>
                                                <small class="text-danger">{{ $errors->first('year') }}</small>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="forms-sample" method="GET" action="{{route('exportExcelRange')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="card-title text-dark col-sm-3 col-form-label">Jurnal Umum Rentang Waktu</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <select class="form-control" name="rangeCategory">
                                                        <option value="all">Semua</option>
                                                        @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" class="form-control" onfocus="(this.type='date')" value="{{ old('dateFrom') }}" name="dateFrom" placeholder="Dari Tanggal . . .">
                                                    <input type="text" class="form-control" onfocus="(this.type='date')" value="{{ old('dateTo') }}" name="dateTo" placeholder="Sampai Tanggal . . .">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary btn-icon-text" type="submit">
                                                        <i class="mdi mdi-download"></i>
                                                        Download</button>
                                                    </div>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('rangeCategory') }}</small>
                                                <small class="text-danger">{{ $errors->first('dateFrom') }}</small>
                                                <small class="text-danger">{{ $errors->first('dateTo') }}</small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('footer')
            </div>
        </div>
    </div>

<!--YEAR-------------------------------------------------------------------->
<script>
    var currentYear = new Date().getFullYear();
    document.getElementById("currentYear").innerHTML = currentYear;

    var lastYear = (new Date().getFullYear()) - 1;
    document.getElementById("lastYear").innerHTML = lastYear;
</script>

<!--Sampah chart Price----------------------------------------------------------------------->
<script>
    var ctx = document.getElementById("priceChart").getContext('2d');

    var price1 = @json($price1);
    var price2 = @json($price2);
    var year1 = new Date().getFullYear();
    var year2 = (new Date().getFullYear())-1;

    var trashChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Januari","Februari","Maret","Apri","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [{
     label: 'Tahun '+ year1,
     backgroundColor: 'rgba(255, 99, 132, 0.2)',
     borderColor: 'rgba(255,99,132,1)',
                                        data: [price1[0], price1[1], price1[2], price1[3], price1[4], price1[5], price1[6], price1[7], price1[8], price1[9], price1[10], price1[11]],
     fill: false,
    }, {
     label: 'Tahun '+ year2,
     fill: true,
     backgroundColor: 'rgba(54, 162, 235, 0.2)',
     borderColor: 'rgba(54, 162, 235, 1)',
                                        data: [price2[0], price2[1], price2[2], price2[3], price2[4], price2[5], price2[6], price2[7], price2[8], price2[9], price2[10], price2[11]],
    }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<!--Sampah chart Price----------------------------------------------------------------------->
<script>
    var ctx = document.getElementById("weightChart").getContext('2d');

    var weight1 = @json($weight1);
    var weight2 = @json($weight2);
    var year1 = new Date().getFullYear();
    var year2 = (new Date().getFullYear())-1;

    var trashChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Januari","Februari","Maret","Apri","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [{
     label: 'Tahun '+ year1,
     backgroundColor: 'rgba(255, 99, 132, 0.2)',
     borderColor: 'rgba(255,99,132,1)',
                                        data: [weight1[0], weight1[1], weight1[2], weight1[3], weight1[4], weight1[5], weight1[6], weight1[7], weight1[8], weight1[9], weight1[10], weight1[11]],
     fill: false,
    }, {
     label: 'Tahun '+ year2,
     fill: true,
     backgroundColor: 'rgba(54, 162, 235, 0.2)',
     borderColor: 'rgba(54, 162, 235, 1)',
                                        data: [weight2[0], weight2[1], weight2[2], weight2[3], weight2[4], weight2[5], weight2[6], weight2[7], weight2[8], weight2[9], weight2[10], weight2[11]],
    }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<!--Kategori chart Current Year-------------------------------------------------------------------->
<script>
	var ctx = document.getElementById("categoryCurrentYear").getContext('2d');
	var kertas1 = {{json_encode($kertas1)}};
	var plastik1 = {{json_encode($plastik1)}};
    var kaca1 = {{json_encode($kaca1)}};
    var besi1 = {{json_encode($besi1)}};
    var logam1 = {{json_encode($logam1)}};
    var elektronik1 = {{json_encode($elektronik1)}};
    var lainlain1 = {{json_encode($lainlain1)}};
    var categoryChart = new Chart(ctx, {
        type: 'doughnut',
   data: {
    datasets: [{
                    data: [kertas1, plastik1, kaca1, besi1, logam1, elektronik1, lainlain1],
     backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 102, 1, 1)'
     ],
     label: 'Dataset 1'
    }],
    labels: [
     'Kertas',
	 'Plastik',
	 'Kaca',
	 'Besi',
	 'Logam',
	 'Elektronik',
	 'Lain-lain'
    ]
   },
   options: {
    legend: {
     position: 'top',
    },
    animation: {
     animateScale: true,
     animateRotate: true
    }
   }
    });
</script>

<!--Kategori chart Last Year-------------------------------------------------------------------->
<script>
	var ctx = document.getElementById("categoryLastYear").getContext('2d');
	var kertas2 = {{json_encode($kertas2)}};
	var plastik2 = {{json_encode($plastik2)}};
    var kaca2 = {{json_encode($kaca2)}};
    var besi2 = {{json_encode($besi2)}};
    var logam2 = {{json_encode($logam2)}};
    var elektronik2 = {{json_encode($elektronik2)}};
    var lainlain2 = {{json_encode($lainlain2)}};
    var categoryChart = new Chart(ctx, {
        type: 'doughnut',
   data: {
    datasets: [{
                    data: [kertas2, plastik2, kaca2, besi2, logam2, elektronik2, lainlain2],
     backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 102, 1, 1)'
     ],
     label: 'Dataset 1'
    }],
    labels: [
     'Kertas',
	 'Plastik',
	 'Kaca',
	 'Besi',
	 'Logam',
	 'Elektronik',
	 'Lain-lain'
    ]
   },
   options: {
    legend: {
     position: 'top',
    },
    animation: {
     animateScale: true,
     animateRotate: true
    }
   }
    });
</script>



<!--Script------------------------------------------------------------------------------>
    <script src="../assets/dashboardAssets/vendors/base/vendor.bundle.base.js"></script>
    <script src="../assets/dashboardAssets/js/template.js"></script>
    <script src="../assets/dashboardAssets/vendors/chart.js/Chart.min.js"></script>
    <script src="../dashboardAssets/vendors/progressbar.js/progressbar.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/raphael-2.1.4.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/justgage.js"></script>
    <script src="../assets/dashboardAssets/js/dashboard.js"></script>

	<script src="../assets/dashboardAssets/vendors/chart.js/Chart.min.js"></script>
 	<script src="../assets/dashboardAssets/js/chart.js"></script>
</body>
</html>
