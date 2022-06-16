<!DOCTYPE html>
<html lang="en">

<head>
    <title>Datta Able - Signin</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ url('admin/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ url('admin/assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.css') }}">

</head>

<body>
    <div class="auth-wrapper aut-bg-img-side cotainer-fiuid align-items-stretch">
        <div class="row align-items-center w-100 align-items-stretch bg-white">
            <div class="d-none d-lg-flex col-lg-8 aut-bg-img align-items-center d-flex justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-white mb-5">Selamat datang di Booking Hub</h1>
                    <h5 class="text-white">Pengelolaan admin tempat karoke.</h5>
                </div>
            </div>
            <div class="col-lg-4 align-items-stret h-100 align-items-center d-flex justify-content-center">
                <form action="{{ route("login") }}" method="POST">
                    @csrf
                    <div class=" auth-content text-center">
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Login</h3>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="remember" {{old('remember' ? 'checked' : '')}} id="checkbox-fill-a1" checked="">
                                <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ url('admin/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pcoded.min.js') }}"></script>

</body>
</html>
