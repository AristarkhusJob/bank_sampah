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
                    <form class="form-sample" action="{{route('beswan.update',$choose->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label class="card-title">Nama Beswan :</label>
                      @if(old('name') == "")
                      <input autocomplete="off" type="text" name="name" class="form-control" value="{{$choose->name}}">
                      @else
                      <input autocomplete="off" type="text" name="name" class="form-control" value="{{ old('name') }}">
                      @endif
                      <small class="text-danger">{{ $errors->first('name') }}</small>
                      <small class="text-danger">{!! \Session::get('error') !!}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Sekolah :</label>
                      @if(old('school') == "")
                      <input autocomplete="off" type="text" name="school" class="form-control" value="{{$choose->school}}">
                      @else
                      <input autocomplete="off" type="text" name="school" class="form-control" value="{{ old('school') }}">
                      @endif
                      <small class="text-danger">{{ $errors->first('school') }}</small>
                    </div>
                    <a href="{{route('beswan.index')}}" class="btn btn-light">Cancel</a>
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
</body>
</html>
