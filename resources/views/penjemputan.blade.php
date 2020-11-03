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
              <div class="col-lg-12">
                <div class="alert alert-success">
                  <p>{{$message}}</p>
                </div>
              </div>
              @endif
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <form method="GET" action="{{route('notif.index')}}" accept-charset="UTF-8" enctype="multipart/form-data">
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
                      <div class="col-right">
                            <div class="form-group">
                                <a class="btn btn-success btn-lg" href="{{route('notif.index')}}">Refresh</a>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
            @foreach ($notification as $item)
              <div class="col-12 grid-margin stretch-card">
                <div class="col-11 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title text-primary">{{$item->date}}</h4>
                      <span class="card-title">Nama :</span><span> {{$item->name}}</span></br>
                      <span class="card-title">No WA :</span><span><a href="https://api.whatsapp.com/send?phone=62{{$item->phoneNumber}}"> {{$item->phoneNumber}}</a></span></br>
                      <span class="card-title">Alamat Pengambilan :</span>
                      @if(strpos($item->address, "http") !== false)
                      <?php
                      $array = explode("http", $item->address);
                      $arraySecond = explode(" ", $array[1]);
                      echo $arraySecond[0];
                      ?>
                      <a href="http{{$arraySecond[0]}}"> http{{$arraySecond[0]}}</a></br>
                      @else
                      <a href="https://www.google.com/maps/dir/?api=1&destination={{$item->address}}"> {{$item->address}}</a></br>
                      @endif
                      <span class="card-title">Keterangan :</span><span> {{$item->information}}</span></br>
                    </div>
                  </div>
                  <form class="input-group-append" action="{{ route('notif.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                     <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
                @endforeach
                    {!! $notification->appends(Request::only(['search'=>'search']))->render() !!}
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
