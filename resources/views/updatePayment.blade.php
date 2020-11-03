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
    <link rel="stylesheet" href="{asset('../assets/dashboardAssets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{asset('../assets/dashboardAssets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">

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
                    <form class="form-sample" action="{{route('payment.update',$choose->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label class="card-title">Nama : {{ $choose->beswan->name }}</label>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Sekolah : {{ $choose->beswan->school }}</label>
                    </div>
                    <div class="form-group">
                    <label class="card-title">Bulan :</label>
                      <select class="form-control" name="month" id="category">
                        @if(old('category') == "")
                        <option value="" selected>{{ $choose->month }}</option>
                        @else
                        <option value="{{ old('month') }}" selected>{{ old('month') }}</option>
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
                      <small class="text-danger">{{ $errors->first('month') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Tahun :</label>
                      @if(old('year') == "")
                      <input autocomplete="off" type="text" name="year" class="form-control" value="{{$choose->year}}">
                      @else
                      <input autocomplete="off" type="text" name="year" class="form-control" value="{{ old('year') }}">
                      @endif
                      <small class="text-danger">{{ $errors->first('year') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Nominal :</label>
                      @if(old('price') == "")
                      <input autocomplete="off" type="text" name="price" class="form-control" value="{{$choose->price}}">
                      @else
                      <input autocomplete="off" type="text" name="price" class="form-control" value="{{ old('price') }}">
                      @endif
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
