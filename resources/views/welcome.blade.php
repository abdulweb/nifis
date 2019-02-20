<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Nigerian family information system</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <link href="assets/css/stylesheet.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                        <a class="navbar-brand text-white" href="">Nigeria Family Train</a>
                        </div>
                        <ul class="nav navbar-nav navbar-right m-r-10">
                            <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            
            <div class="content-pages">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Timeline </h4>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="timeline">
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show first">
                                                <a href="#" class="btn btn-danger w-lg">Today</a>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="">1 hour ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The labbo family was the most populated family in Nigeria? </p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item ">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow"></span>
                                                    <span class="timeline-icon bg-success"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="text-success">1 hours ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The Bagudo local government was the most populated local government in Nigeria </p>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="timeline-item alt">
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="timeline-box">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon bg-primary"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                    <h4 class="text-primary">1 hours ago</h4>
                                                    <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                    <p>The kebbi state was the most populated state in Nigeria</p>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show">
                                                <a href="#" class="btn btn-danger w-lg">Last Month</a>
                                            </div>
                                        </div>
                                    </article>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer footer-text">
                    <p> © <?=date('Y')?>  Nigerian Family information system.</p>
                </footer>

            </div>


            
        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>