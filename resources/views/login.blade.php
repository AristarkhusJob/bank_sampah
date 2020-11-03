<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sampah Untuk Sekolah</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="../assets/loginAssets/images/icons/logo.ico"/>
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginAssets/css/main.css">
    <!--===============================================================================================-->
    <script src="../resources/js/platform.js"></script>
</head>

<body>
    <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="../assets/loginAssets/images/logo.png" alt="IMG">
                    </div>
                    <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                        <span class="login100-form-title">
                            Sampah Untuk Sekolah
                        </span>

                       
                        <div class="wrap-input100 validate-input" data-validate = "Username required">
                        @if(Session::has('alert-failed'))
                        <div class="alert alert-danger" style="margin:auto">
                            <div>{{ Session::get('alert-failed') }}</div>
                        </div>
                        @endif
                            <input autocomplete="off" class="input100" type="text" name="username" placeholder="Username"
                                @if(Session::has('username.old'))
                                    value="{{ Session::get('username.old') }}"
                                @endif
                            >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input autocomplete="off" class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                    </form>
                </div>
            </div>
        </div>

    <!--===============================================================================================-->
    <script src="../assets/loginAssets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../assets/loginAssets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/loginAssets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/loginAssets/vendor/select2/select2.min.js"></script>
	<script src="../assets/loginAssets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="../assets/loginAssets/js/main.js"></script>
    <!--===============================================================================================-->

</body>
</html>