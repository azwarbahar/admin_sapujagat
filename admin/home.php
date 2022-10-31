<?php
require_once '../template/header.php';
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Dashboard</h4>
                    <p class="text-muted page-title-alt">Selamat datang di admin SAPUJAGAT !</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-store-mall-directory text-primary"></i>
                        <?php
                        $outlet = mysqli_query($conn, "SELECT * FROM tb_outlet");
                        $row_outlet = mysqli_num_rows($outlet);
                        $row_outlet_final = $row_outlet;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_outlet_final ?></h2>
                        <div class="text-muted m-t-5">Total Outlet</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-group text-pink"></i>
                        <?php
                        $sales = mysqli_query($conn, "SELECT * FROM tb_sales");
                        $row_sales = mysqli_num_rows($sales);
                        $row_sales_final = $row_sales;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_sales_final ?></h2>
                        <div class="text-muted m-t-5">Total Salesforce</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-assignment text-info"></i>
                        <?php
                        $kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan");
                        $row_kunjungan = mysqli_num_rows($kunjungan);
                        $row_kunjungan_final = $row_kunjungan;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_kunjungan_final ?></h2>
                        <div class="text-muted m-t-5">Total Kunjungan</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget-panel widget-style-2 bg-white">
                        <i class="md md-report text-danger"></i>
                        <?php
                        $kendala = mysqli_query($conn, "SELECT * FROM tb_kendala");
                        $row_kendala = mysqli_num_rows($kendala);
                        $row_kendala_final = $row_kendala;
                        ?>
                        <h2 class="m-0 text-dark counter font-600"><?= $row_kendala_final ?></h2>
                        <div class="text-muted m-t-5">Laporan Kendala</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div id="googleMap" style="width:100%;height:400px;"></div> -->
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>