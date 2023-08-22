<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SIPLA || LOGIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/ready.css">
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/demo.css">

</head>
<body>
	<div class="login-page">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/aksiLogin') }}" method="post">
                    @csrf
                    <div class="box-login">
                        <div class="box-header">
                            <h2>SIPLA</h2>
                            <p>Sistem Informasi Lahan</p>
                            @include('layout.notif')
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="squareInput">Email</label>
                                <input type="email" name="email" class="form-control input-square" id="email" placeholder="Email ..." required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="squareInput">Password</label>
                                <input type="password" name="password" class="form-control input-square" id="password" placeholder="Password ..." required autocomplete="off">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary">SIGN-IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ url('public') }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ url('public') }}/assets/js/core/popper.min.js"></script>
<script src="{{ url('public') }}/assets/js/core/bootstrap.min.js"></script>

<script src="{{ url('public') }}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<script src="{{ url('public') }}/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="{{ url('public') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{ url('public') }}/assets/js/ready.min.js"></script>
@include('layout.notif')
</html>