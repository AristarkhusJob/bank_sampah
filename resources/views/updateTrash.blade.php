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
                    <form class="form-sample" action="{{route('trash.update',$choose->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label class="card-title">Kategori :</label>
                      <select class="form-control" name="category" id="category">
                        @if(old('category') == "")
                        <option value="" disabled selected>{{ $choose->category->category_name }}</option>
                        @endif
                        @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                      </select>
                      <small class="text-danger">{{ $errors->first('category') }}</small>
                    </div>
                    <div class="form-group">
                      <label class="card-title">Nama Sampah :</label>
                      @if(old('trash_name') == "")
                      <input autocomplete="off" type="text" name="trash_name" class="form-control" value="{{$choose->trash_name}}">
                      @else
                      <input autocomplete="off" type="text" name="trash_name" class="form-control" value="{{ old('trash_name') }}">
                      @endif
                      <small class="text-danger">{{ $errors->first('trash_name') }}</small>
                      <small class="text-danger">{!! \Session::get('error') !!}</small>
                    </div>
                    <a href="{{route('trash.index')}}" class="btn btn-light">Cancel</a>
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
