<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sampah Untuk Sekolah</title>
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/dashboardAssets/css/style.css">
    <link rel="shortcut icon" href="../assets/dashboardAssets/images/favicon.png">

  </head>
  <body>
    <div class="container-scroller">
    @include('header')
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
            @if ($message = Session::get('success'))
              <div class="col">
                <div class="alert alert-success">
                  <p>{{$message}}</p>
                </div>
              </div>
            @endif
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <a class="btn btn-primary btn-lg" href="{{ route('user.create') }}">Tambah User</a>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <form method="GET" action="{{route('user.index')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" name="search" placeholder="Search . . . " autocomplete="off">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-primary">Search</button>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <a class="btn btn-success btn-lg" href="{{route('user.index')}}">Refresh</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive pt-3">
                    <table class="table table-hover">
                      <thead>
                        <tr class="table-info">
                          <th class="card-title text-primary" width = "50px"><b>No.</b></th>
                          <th class="card-title text-primary">Username</th>
                          <th class="card-title text-primary">Name</th>
                          <th class="card-title text-primary">Type</th>
                          <th class="card-title text-primary" width = "180px">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($user as $item)
                        <tr>
                          <td><b>{{++$i}}.</b></td>
                          <td>{{$item->username}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->type}}</td>
                          <td>
                            <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                <a class="btn btn-outline-warning btn-fw" href="{{route('user.edit',$item->id)}}">Edit</a>
                                @csrf
                                @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger btn-fw">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  </br>
                  <div class="row justify-content-center">
                    {!! $user->appends(Request::only(['search'=>'search']))->render() !!}
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
