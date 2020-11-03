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
                    <form class="form-sample" action="{{route('transaction.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label class="card-title">Sampah : </label>
                        </br>
                        <select name="trash_name" class="js-example-basic-single">
                          @foreach($trash as $item)
                          <option value="{{ $item->id }}">{{ $item->trash_name }}</option>
                          @endforeach
                        </select>
                        </br>
                        <small class="text-danger">{{ $errors->first('trash_name') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Tanggal : </label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                        <small class="text-danger">{{ $errors->first('date') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Donatur :</label>
                        <input autocomplete="off" type="text" step="any" name="donatur" class="form-control" placeholder="Masukkan Donatur Sampah" value="{{ old('donatur') }}">
                        <small class="text-danger">{{ $errors->first('donatur') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Berat :</label>
                        <input autocomplete="off" type="number" step="any" name="weight" class="form-control" placeholder="Masukkan Berat Sampah" value="{{ old('weight') }}">
                        <small class="text-danger">{{ $errors->first('weight') }}</small>
                      </div>
                      <div class="form-group">
                        <label class="card-title">Harga :</label>
                        <input autocomplete="off" type="number" step="any" name="price" class="form-control" placeholder="Masukkan Harga Sampah" value="{{ old('price') }}">
                        <small class="text-danger">{{ $errors->first('price') }}</small>
                      </div>
                      <a href="{{route('transaction.index')}}" class="btn btn-light">Cancel</a>
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
  <script src="../assets/dashboardAssets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../assets/dashboardAssets/vendors/select2/select2.min.js"></script>
  <script src="../assets/dashboardAssets/js/file-upload.js"></script>
  <script src="../assets/dashboardAssets/js/typeahead.js"></script>
<script src="../assets/dashboardAssets/js/select2.js"></script>

</body>
</html>
