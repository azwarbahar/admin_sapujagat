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

                    <h4 class="page-title">Survey Harga</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Survey</a>
                        </li>
                        <li class="active">
                            Harga
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
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Telkomsel' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Telkomsel' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                                                                    provider = 'Telkomsel' AND
                                                                                                    kunjungan_id = '$dta_kunjungan[id]'AND
                                                                                                    outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                                    <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                    <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                                                                kunjungan_id = '$dta_kunjungan[id]'AND
                                                                                                outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                                        <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                        <td> $dta_produk_kosong[harga_jual] </td>";
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
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Indosat' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Indosat' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                        <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                                                provider = 'Indosat' AND
                                                                                kunjungan_id = '$dta_kunjungan[id]'AND
                                                                                outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                                            kunjungan_id = '$dta_kunjungan[id]'AND
                                                                            outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                    <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                    <td> $dta_produk_kosong[harga_jual] </td>";
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
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Tree' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Tree' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                    <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                            provider = 'Tree' AND
                                                            kunjungan_id = '$dta_kunjungan[id]'AND
                                                            outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                        <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                        kunjungan_id = '$dta_kunjungan[id]'AND
                                                        outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                                            <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                            <td> $dta_produk_kosong[harga_jual] </td>";
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
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'XL' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'XL' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                    <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                                    provider = 'XL' AND
                                                                    kunjungan_id = '$dta_kunjungan[id]'AND
                                                                    outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                                                <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                                <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                                kunjungan_id = '$dta_kunjungan[id]'AND
                                                                outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                                                    <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                                    <td> $dta_produk_kosong[harga_jual] </td>";
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
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Axis' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Axis' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                    <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                provider = 'Axis' AND
                                                kunjungan_id = '$dta_kunjungan[id]'AND
                                                outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                                        <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                        <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                        kunjungan_id = '$dta_kunjungan[id]'AND
                                                        outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                                <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                <td> $dta_produk_kosong[harga_jual] </td>";
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
                                <table id="datatable2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th>Outlet</th> -->
                                            <th rowspan="2">ID</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" style="text-align: center ;">KP Kosong</th>
                                            <?php
                                            $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Smartfren' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                echo "<th colspan='2' style='text-align: center ;'>$dta_produk_all_operator_telkomsel[nama_produk]</th>";
                                            }
                                            ?>
                                            <th rowspan="2">Salesforce</th>

                                        </tr>
                                        <tr>
                                            <th> Modal </th>
                                            <th> Jual </th>
                                            <?php
                                            $produk_all_operator_telkomsel2 = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Smartfren' ORDER BY jenis_produk ASC ");
                                            foreach ($produk_all_operator_telkomsel2 as $dta_produk_all_operator_telkomsel2) {
                                                echo "<th> Modal </th>
                                                    <th> Jual </th>";
                                            }
                                            ?>
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
                                                $produk_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE nama_produk = 'Perdana Kosong' AND
                                                                provider = 'Smartfren' AND
                                                                kunjungan_id = '$dta_kunjungan[id]'AND
                                                                outlet_id = '$dta[id]'");
                                                if (mysqli_num_rows($produk_kosong) < 1) {
                                                    echo "<td> - </td>
                                                            <td> - </td>";
                                                } else {
                                                    $dta_produk_kosong = mysqli_fetch_assoc($produk_kosong);
                                                    echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                                        <td> $dta_produk_kosong[harga_jual] </td>";
                                                }
                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                    $produk = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]' AND
                                                                        kunjungan_id = '$dta_kunjungan[id]'AND
                                                                        outlet_id = '$dta[id]'");
                                                    if (mysqli_num_rows($produk) < 1) {
                                                        echo "<td> - </td>
                                                                <td> - </td>";
                                                    } else {
                                                        $dta_produk = mysqli_fetch_assoc($produk);
                                                        echo "<td> $dta_produk_kosong[harga_modal] </td>
                                                                <td> $dta_produk_kosong[harga_jual] </td>";
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