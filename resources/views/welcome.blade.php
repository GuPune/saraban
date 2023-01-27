
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}"  />
  <title>saraban</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<style>

/* #btn {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}


#btn {
  background: radial-gradient(#fbc1cc, #fa99b2);
} */

.gradient-custom {
/* fallback for old browsers */
background: #cb8111;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgb(203, 126, 17), rgb(252, 195, 37));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgb(203, 126, 17), rgb(252, 195, 37))
}



</style>
<body class="gradient-custom">

                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">

                    <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card bg-warning text-white">
                    <div class="card bg-dark text-white">
                        <div class="card-body p-4 text-center">
                        <div class="card-header text-center">

                        <a href="{{asset('#')}}" class="h1 text-white"> <b> ID </b>  DRIVES </a>
                        </div>
                        <div class="card-body">
                        <p class="login-box-msg text-white ">Please enter your login!</p>

                        <!-- <form action="{{asset('#')}}" method="post"> -->
                            <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                <input type="checkbox"  id="remember_me" name="remember">
                                <label for="remember" class="text-white">
                                    Remember Me
                                </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-dark btn-block" >{{ __('Log in') }}</button>
                            </div>
                            <!-- /.col -->
                            </div>
                        </form>

                            </div>
                            </div>
                        </div>
                        </div>

                    </div>

                    </div>


                    <!-- jQuery -->
                    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
                    <!-- Bootstrap 4 -->
                    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                    <!-- AdminLTE App -->
                    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>

                <div>
            <div>
</section>
    </body>
</html>


