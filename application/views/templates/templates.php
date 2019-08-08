<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url(TEMPLATE . '/production/images/favicon.ico') ?>" type="image/ico" />

    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url(TEMPLATE) ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(TEMPLATE) ?>/build/css/custom.min.css" rel="stylesheet">
    <script src="<?= base_url(TEMPLATE) ?>/vendors/jquery/dist/jquery.min.js"></script>
    <script>
        if (window.sessionStorage.getItem("status") != "logged_in" && window.sessionStorage.getItem("status") ==
            undefined) {
            window.location.href = "<?= base_url('auth'); ?>";
        }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" -->
    <!-- integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <!-- <div class="col-md-3 left_col menu_fixed"> -->
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= base_url('') ?>" class="site_title"><i class="fa fa-paw"></i>
                            <span>LOWCARBON</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>"
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2 class="namaAdmin"></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Dashboard</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Tempat Pembuangan <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('tpa') ?>">TPA</a></li>
                                        <li><a href="<?= base_url('tps') ?>">TPS</a></li>
                                        <li><a href="<?= base_url('station') ?>">STATION</a></li>
                                        <li><a href="<?= base_url('sampah') ?>">SAMPAH</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Daftar</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;Lokasi<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('district') ?>">District</a></li>
                                        <li><a href="<?= base_url('city') ?>">City</a></li>
                                        <li><a href="<?= base_url('province') ?>">Province</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;Sensor<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('co') ?>">CO</a></li>
                                        <li><a href="<?= base_url('wind') ?>">WIND</a></li>
                                        <li><a href="<?= base_url('methande') ?>">METHANE</a></li>
                                        <li><a href="<?= base_url('humidity') ?>">HUMIDITY</a></li>
                                        <li><a href="<?= base_url('winddirection') ?>">WIND DIRECTION</a></li>
                                        <li><a href="<?= base_url('voltage') ?>">VOLTAGE</a></li>
                                        <li><a href="<?= base_url('co2') ?>">CO2</a></li>
                                        <li><a href="<?= base_url('temparature') ?>">TEMPERATURE</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" class="logoutBtn">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>" alt=""><span
                                        class="namaAdmin"></span>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a class="logoutBtn"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img
                                                    src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img
                                                    src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img
                                                    src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img
                                                    src="<?= base_url(TEMPLATE . '/production/images/img.jpg') ?>"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <?php $this->load->view($halaman); ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <script src="<?= base_url(TEMPLATE) ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/nprogress/nprogress.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/iCheck/icheck.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/skycons/skycons.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/DateJS/build/date.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url(TEMPLATE) ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(TEMPLATE) ?>/build/js/custom.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".namaAdmin").text(sessionStorage.nama_admin);
            $(".namaAdmin").text(sessionStorage.nama_admin);
            $(".logoutBtn").click(function (e) {
                e.preventDefault();
                sessionStorage.clear();
                window.location.reload();
            });
        });
        // console.log($("#namaAdmin"));
    </script>
</body>

</html>