<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/css/animate.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/css/style.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="{{ URL::to('/') }}/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="{{ URL::to('/') }}/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->

        @yield('after-styles')

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="{{ URL::to('/') }}/assets/plugins/pace/pace.min.js"></script>
        <!-- ================== END BASE JS ================== -->
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>

    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

            <!-- begin #header -->
            @include('backend.includes.header')
            <!-- end #header -->

            <!-- begin #sidebar -->
            @include('backend.includes.sidebar')
            <!-- end #sidebar -->

            <!-- begin #content -->
            <div id="content" class="content">
                @yield('content')
            </div>
            <!-- end #content -->

        </div>

        <!-- JavaScripts -->
        @yield('before-scripts')
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
        <script src="{{ URL::to('/') }}/assets/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/sparkline/jquery.sparkline.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="{{ URL::to('/') }}/assets/js/dashboard.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/js/apps.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        @yield('after-scripts')
    </body>
</html>