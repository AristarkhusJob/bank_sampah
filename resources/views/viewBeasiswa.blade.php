<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sampah Untuk Sekolah</title>
    <link rel="stylesheet" href="{{asset('../assets/dashboardAssets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/dashboardAssets/vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/dashboardAssets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('../assets/dashboardAssets/images/favicon.png')}}">

  </head>
  <body>
    <div class="container-scroller">
      @include('headerNoMenu')
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">

                    <a href="{{route('beasiswa.index')}}" class="btn btn-light">Back</a>
                    <br>
                    <br>

                    <div class="form-group">
                        <label class="card-title">Nama    : {{ $choose->name }}</label>
                        <br>
                        <label class="card-title">Sekolah : {{ $choose->school }}</label>
                        <br>
                        <label class="card-title">Total : Rp. {{ $total }},-</label>
                    </div>

                    <div class="table-responsive pt-3">
                    <table class="table table-hover">
                      <thead>
                        <tr class="table-info">
                          <th class="card-title text-primary">No.</th>
                          <th class="card-title text-primary">Bulan</th>
                          <th class="card-title text-primary">Tahun</th>
                          <th class="card-title text-primary">Nominal</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($payment as $item)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$item->month}}</td>
                          <td>{{$item->year}}</td>
                          <td>Rp. {{$item->price}},-</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        @include('footer')
        </div>
      </div>
    </div>


<!-- design web ============================================ -->
<script src="../assets/dashboardAssets/vendors/base/vendor.bundle.base.js"></script>
    <script src="../assets/dashboardAssets/js/template.js"></script>
    <script src="../assets/dashboardAssets/vendors/chart.js/Chart.min.js"></script>
    <script src="../dashboardAssets/vendors/progressbar.js/progressbar.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/raphael-2.1.4.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/justgage.js"></script>
    <script src="../assets/dashboardAssets/js/dashboard.js"></script>
</body>
</html>
