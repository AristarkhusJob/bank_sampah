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
                    <form class="form-sample" action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label class="card-title">Username :</label>
                      <input autocomplete="off" type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan Username">
                      <small class="text-danger">{{ $errors->first('username') }}</small>
                      <small class="text-danger">{!! \Session::get('error') !!}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Password :</label>
                      <input autocomplete="off" type="password" name="password" class="form-control" placeholder="Masukkan Password">
                      <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Konfirmasi Password :</label>
                      <input autocomplete="off" type="password" name="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password">
                      <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Nama :</label>
                      <input autocomplete="off" type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan Nama">
                      <small class="text-danger">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Tipe User :</label>
                      <select class="form-control" name="type" id="type">
                        <option value="{{ old('type') }}" selected>{{ old('type') }}</option>
                        <option value="super admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        <option value="beswan">Beswan</option>
                      </select>
                      <small class="text-danger">{{ $errors->first('type') }}</small>
                    </div>    
                    <a href="{{route('user.index')}}" class="btn btn-light">Cancel</a>
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
