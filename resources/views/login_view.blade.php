<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::to('assets/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css')}}"> 
  <link rel="stylesheet" href="{{ url('assets/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css')}}"> <!--Recommended-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/square/blue.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="{{ asset('assets/favicon.ico')}}" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png')}}">
  <link rel="manifest" href="{{ asset('assets/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('assets/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  @if(Session::has('message'))
  <div role="alert" class="alert  {{ Session::get('alert-class') }} alert-dismissible"><a aria-label="Close " data-dismiss="alert" class="closed pull-right fa fa-times"></a>
      <p>{{ Session::get('message') }}</p>
  </div>
  @endif
  <div class="login-logo">
    <a href="#"><b>Admin Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div id="login_error" style="text-align:center"></div>
    <p class="login-box-msg">Sign In</p>
    <form id="user_login_form_notUsed" action="{{ url('user_login') }}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input text="text" name="username" class="form-control" placeholder="Username/Email" data-msg-required="Username/Email is required" value="{{ old('username') }}">@if($errors->has('username'))<div class="error">{{ $errors->first('username') }}</div>@endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" data-msg-required="Password is required" value="{{ old('password') }}">@if($errors->has('password'))<div class="error">{{ $errors->first('password') }}</div>@endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat user_login_btn">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('assets/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{ asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('assets/js/login.js')}}"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>

</html>
