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

                    <h4 class="page-title">Survey Produsen</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Survey</a>
                        </li>
                        <li class="active">
                            Produsen
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Telkomsel";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Telkomsel";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Telkomsel";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatable4" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Telkomsel";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                    <!-- INDOSAT -->
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable5" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Indosat";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable6" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Indosat";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable7" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Indosat";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatable8" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Indosat";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable9" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Tree";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable10" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Tree";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable11" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Tree";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatable12" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Tree";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable13" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "XL";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable14" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "XL";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable15" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "XL";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatable16" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "XL";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                    <!-- AXIS -->
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable17" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Axis";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable18" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Axis";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable19" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Axis";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatabl20" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Axis";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Pulsa</b></h4>
                                <table id="datatable21" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Aplikasi</th>
                                            <th>Server Luar</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Smartfren";
                                        $i = 1;
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

                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$dta[id]'
                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_pulsa) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_pulsa = mysqli_fetch_assoc($result_produsen_pulsa);
                                                    if ($operator == "Telkomsel") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_distributor] </td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nilai_distributor] </td> ";
                                                    }
                                                    if ($dta_result_produsen_pulsa['use_app'] == "Ya") {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-success'>Ya</span ></td> ";
                                                    } else {
                                                        echo "<td> $dta_result_produsen_pulsa[nama_app]<span class=' m-l-15 label label-table label-danger'>Tidak</span ></td> ";
                                                    }
                                                    echo "<td> $dta_result_produsen_pulsa[nilai_server_lain] </td> ";
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

                                <h4 style="color: darkorange ;"><b>Perdana Segel</b></h4>
                                <table id="datatable22" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Smartfren";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Perdana Paket</b></h4>
                                <table id="datatable23" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Smartfren";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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

                                <h4 style="color: darkorange ;"><b>Voucher Fisik</b></h4>
                                <table id="datatabl24" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Distributor Resmi</th>
                                            <th>Sulawesi</th>
                                            <th>Kalimantan</th>
                                            <th>Papua/Maluku</th>
                                            <th>Jawa</th>
                                            <th>Bali/NTT</th>
                                            <th>Sumatra</th>
                                            <th>Salesforce</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $operator = "Smartfren";
                                        $i = 1;
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


                                                $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$dta[id]'
                                                                                                            AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                if (mysqli_num_rows($result_produsen_perdana) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_result_produsen_perdana = mysqli_fetch_assoc($result_produsen_perdana);
                                                    if ($operator == "Telkomsel") {
                                                        if ($dta_result_produsen_perdana['nama_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nama_distributor] </td> ";
                                                        }
                                                    } else {
                                                        if ($dta_result_produsen_perdana['nilai_distributor'] == "") {
                                                            echo "<td> - </td> ";
                                                        } else {
                                                            echo "<td> $dta_result_produsen_perdana[nilai_distributor] </td> ";
                                                        }
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sulawesi'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sulawesi]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_kalimantan'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_kalimantan]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_papua_maluku'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_papua_maluku]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_jawa'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_jawa]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_bali_ntt'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_bali_ntt]</td>";
                                                    }
                                                    if ($dta_result_produsen_perdana['broker_sumatera'] == "") {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        echo "<td>$dta_result_produsen_perdana[broker_sumatera]</td>";
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