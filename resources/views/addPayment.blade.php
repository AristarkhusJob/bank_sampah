<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sampah Untuk Sekolah</title>
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/css/style.css">
    <link rel="shortcut icon" href="../assets/dashboardAssets/images/favicon.png">
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

    <script src="../assets/dashboardAssets/js/jquery.min.js"></script>

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
                    <form class="form-sample" action="{{route('payment.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label class="card-title">Nama :</label>
                        </br>
                        <select name="name" class="js-example-basic-single">
                          @foreach($beswan as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        </br>
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Month :</label>
                        <br>
                        <select name="month" class="js-example-basic-single">
                          <option value="{{ old('month') }}" selected>{{ old('month') }}</option>
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
                        <small class="text-danger">{{ $errors->first('Month') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Tahun :</label>
                        <input autocomplete="off" type="number" step="any" name="year" class="form-control" placeholder="Masukkan Tahun" value="{{ old('year') }}">
                        <small class="text-danger">{{ $errors->first('year') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Nominal :</label>
                        <input autocomplete="off" type="number" step="any" name="price" class="form-control" placeholder="Masukkan Nominal Bayar" value="{{ old('price') }}">
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                      </div>
                      <a href="{{route('payment.index')}}" class="btn btn-light">Cancel</a>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
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


<!-- design web ============================================ -->
    <script src="../assets/dashboardAssets/vendors/base/vendor.bundle.base.js"></script>
    <script src="../assets/dashboardAssets/js/template.js"></script>
    <script src="../assets/dashboardAssets/vendors/chart.js/Chart.min.js"></script>
    <script src="../dashboardAssets/vendors/progressbar.js/progressbar.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/raphael-2.1.4.min.js"></script>
	<script src="../assets/dashboardAssets/vendors/justgage/justgage.js"></script>
    <script src="../assets/dashboardAssets/js/dashboard.js"></script>
    <script src="../assets/dashboardAssets/vendors/select2/select2.min.js"></script>
    <script src="../assets/dashboardAssets/js/select2.js"></script>
</body>
</html>
