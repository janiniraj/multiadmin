<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Multi Admin | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/css/animate.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/css/style.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image"><img src="{{ URL::to('/') }}/assets/img/login-bg/bg-1.jpg" data-id="login-cover-image" alt="" /></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated flipInX">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"></span> Multi Admin
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'margin-bottom-0']) }}
                <div class="form-group m-b-20">
                    {{ Form::input('email', 'email', null, ['required','class' => 'form-control input-lg', 'placeholder' => 'Email Address']) }}
                </div>
                <div class="form-group m-b-20">
                    {{ Form::input('password', 'password', null, ['required','class' => 'form-control input-lg', 'placeholder' => "Password"]) }}
                </div>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox" /> Remember Me
                    </label>
                </div>
                <div class="login-buttons">
                    {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-success btn-block btn-lg']) }}
                </div>
                <div class="m-t-20">
                    Not a member yet? Click <a href="#">here</a> to register.
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <!-- end login -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ URL::to('/') }}/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="{{ URL::to('/') }}/assets/crossbrowserjs/html5shiv.js"></script>
<script src="{{ URL::to('/') }}/assets/crossbrowserjs/respond.min.js"></script>
<script src="{{ URL::to('/') }}/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="{{ URL::to('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{ URL::to('/') }}/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ URL::to('/') }}/assets/js/login-v2.demo.min.js"></script>
<script src="{{ URL::to('/') }}/assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        LoginV2.init();
    });
</script>
</body>
</html>