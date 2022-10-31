<?php

require('../koneksi.php');


if (!isset($_SESSION['login_admin'])) {
    header("location: ../login.php");
}

$get_id_session = $_SESSION['get_id'];
$query_header_akun = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id = '$get_id_session'");
$get_data_akun = mysqli_fetch_assoc($query_header_akun);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard Sapujagat">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="../assets/images/favicon_1.ico">

    <title>SAPUJAGAT - Admin Dashboard</title>
    <link href="../assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />


    <!-- <link href="../assets/plugins/responsive-table/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen"> -->

    <link href="../assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/7c872c3741.js" crossorigin="anonymous"></script>

    <!-- Plugins css-->
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!--venobox lightbox-->
    <link rel="stylesheet" href="../assets/plugins/magnific-popup/css/magnific-popup.css" />


    <link href="../assets/plugins/footable/css/footable.core.css" rel="stylesheet">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="../assets/js/modernizr.min.js"></script>

</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index.php" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Sapujagat</span></a>
                    <!-- Image Logo here -->
                    <!-- <a href="index.php" class="logo">
                        <i class="icon-c-logo"> <img src="../assets/images/icon_uianam.png" height="42" /> </i>
                        <span><img src="../assets/images/logo_text.png" height="20" /></span>
                    </a> -->
                </div>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="md md-menu"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                            </li>
                            <li class="dropdown top-menu-item-xs">
                                <?php
                                if ($get_data_akun['foto'] == null || $get_data_akun['foto'] == "") {
                                ?>
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <?php
                                } else {
                                ?>
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/admin/<?= $get_data_akun['foto'] ?>" alt="user-img" class="img-circle"> </a>
                                <?php
                                }
                                ?>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="ti-user m-r-10 text-custom"></i> <?= $get_data_akun['nama'] ?></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#ubah-pass"><i class="ti-key m-r-10 text-custom"></i> Ubah Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->


        <!-- MODAL UBAH PASSWORD -->
        <div id="ubah-pass" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title">Ubah Password</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="controller/controller-admin.php" enctype="multipart/form-data">

                            <br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password Baru</label>
                                <div class="col-sm-9">
                                    <input type="password" class="nb-edt form-control" required="" autocomplete="off" placeholder="Password Baru" name="pass_nes" id="pass_nes">
                                </div>
                            </div>

                            <br>

                            <div class="modal-footer">
                                <input type="hidden" name="id_admin_password" value="<?= $get_data_akun['id'] ?>">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                <button type="submit" name="submit_password_baru" class="btn btn-default waves-effect">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- AKHIR MODAL UBAH PASSWORD -->


        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Logout Akun</h4>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Logout Akun ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <a href="../logout.php?logout=true&for=login_admin" type="button" class="btn btn-primary waves-effect waves-light">Logout</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- ========== Left Sidebar Start ========== -->


        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <!-- <li class="text-muted menu-title">Master Data</li> -->

                        <li class="has_sub">
                            <a href="home.php" class="waves-effect"><i class="ti-layout-grid2-alt"></i> <span>Dashboard </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="outlet.php" class="waves-effect"><i class="ti-home"></i> <span>Outlet </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="salesforce.php" class="waves-effect"><i class="ti-id-badge"></i> <span>Salesforce</span></a>
                        </li>

                        <li class="has_sub">
                            <a href="penjualan.php" class="waves-effect"><i class="ti-truck"></i> <span>Penjualan</span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(1);" class="waves-effect"><i class="ti-pencil-alt"></i> <span> Survey </span> <span class="menu-arrow"></span></a>
                            <ul class="list">
                                <li><a href="survey-stok.php"> Stok</a></li>
                                <li><a href="survey-harga.php">Harga</a></li>
                                <li><a href="survey-branding.php">Branding</a></li>
                                <li><a href="survey-produsen.php">Produsen</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(1);" class="waves-effect"><i class="ti-archive"></i> <span> Produk </span> <span class="menu-arrow"></span></a>
                            <ul class="list">
                                <li><a href="produk-penjualan.php">Produk Penjualan</a></li>
                                <li><a href="produk-all-operator.php">Produk All Operator</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="export-data.php" class="waves-effect"><i class="ti-export"></i> <span>Export Data</span></a>
                        </li>

                        <div class="clearfix"></div>

                        <li class="has_sub">
                            <a href="administrator.php" class="waves-effect"><i class="ti-user"></i> <span>Administrator</span></a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <!-- Left Sidebar End -->