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

                    <h4 class="page-title">Survey Branding</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Survey</a>
                        </li>
                        <li class="active">
                            Branding
                        </li>
                    </ol>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">


                    <!-- TELKOMSEL -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-danger">
                            <h3 class="portlet-title text-dark">
                                Telkomsel
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-telokmsel"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-telokmsel" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Telkomsel'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- INFDOSAT -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-warning">
                            <h3 class="portlet-title text-dark">
                                Indosat
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-indosat"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-indosat" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Indosat'
                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                            AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- TREE -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-pink">
                            <h3 class="portlet-title text-dark">
                                Tree
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-tree"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-tree" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Tree'
                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                            AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- XL -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-info">
                            <h3 class="portlet-title text-dark">
                                XL
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-xl"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-xl" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable4" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'XL'
                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                            AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Axis -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-purple">
                            <h3 class="portlet-title text-dark">
                                Axis
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-axis"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-axis" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable5" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Axis'
                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                            AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- SMARTFREN -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-danger">
                            <h3 class="portlet-title text-dark">
                                Smartfren
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-smartfren"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-smartfren" class="panel-collapse collapse in">
                            <div class="portlet-body  table-responsive">
                                <table id="datatable6" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Spanduk Rangka</th>
                                            <th>Spanduk No Rangka</th>
                                            <th>Papan Harga</th>
                                            <th>Info Program</th>
                                            <th>Kursi</th>
                                            <th>Jam Dinding</th>
                                            <th>Etalase</th>
                                            <th>Voucher Fisik</th>
                                            <th>Kartu Paket</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php $i = 1;
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY 'id' DESC");
                                        foreach ($result_outlet as $dta) { ?>
                                            <tr>
                                                <td> <a href="outlet-detail.php?id=<?= $dta['id'] ?>"><?= $dta['id_outlet'] ?></a></td>
                                                <?php
                                                $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                                                $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                                                ?>
                                                <td><?= $dta_kunjungan['tanggal'] ?></td>
                                                <?php

                                                $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Smartfren'
                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                            AND outlet_id = '$dta[id]' ORDER BY no_branding ASC");
                                                if (mysqli_num_rows($result_branding_telkomsel) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    foreach ($result_branding_telkomsel as $dta_result_branding_telkomsel) {
                                                        if ($dta_result_branding_telkomsel['tersedia'] == "Ya") {
                                                            echo "<td><span class='label label-success'>Yes</span></td>";
                                                        } else {
                                                            echo "<td><span class='label label-danger'>No</span></td>";
                                                        }
                                                    }
                                                }

                                                $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                                $dta_sales = mysqli_fetch_assoc($result_sales);

                                                ?>
                                                <td> <a href="#"><?= $dta_sales['nama'] ?></a> </td>
                                            </tr>

                                        <?php $i = $i + 1;
                                        } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                </div>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>