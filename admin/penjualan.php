<?php
require_once '../template/header.php';

$kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan");

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

                    <h4 class="page-title">Penjualan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li class="active">
                            Data Penjualan
                        </li>
                    </ol>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th>Outlet</th> -->
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <?php
                                    $produk_penjualan = mysqli_query($conn, "SELECT * FROM tb_produk_penjualan");
                                    foreach ($produk_penjualan as $dta_produk_penjualan) {
                                        echo "<th>$dta_produk_penjualan[nama]</th>";
                                    }
                                    ?>
                                    <th>Salesforce</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($kunjungan as $dta) { ?>
                                    <tr>
                                        <?php
                                        $result_outlet = mysqli_query($conn, "SELECT * FROM tb_outlet WHERE id = '$dta[outlet_id]'");
                                        $dta_outlet = mysqli_fetch_assoc($result_outlet);
                                        ?>
                                        <td> <a href="outlet-detail.php?id=<?= $dta_outlet['id'] ?>"><?= $dta_outlet['id_outlet'] ?></a></td>
                                        <td><?= $dta['tanggal'] ?></td>
                                        <?php
                                        $produk_penjualan_tabel = mysqli_query($conn, "SELECT * FROM tb_produk_penjualan");
                                        foreach ($produk_penjualan_tabel as $dta_produk_penjualan_tabel) {
                                            $penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE produk_penjualan_id = '$dta_produk_penjualan_tabel[id]' AND
                                                                                                outlet_id = '$dta[outlet_id]' AND
                                                                                                kunjungan_id = '$dta[id]'");
                                            if (mysqli_num_rows($penjualan) < 1) {
                                                echo "<td> - </td>";
                                            } else {
                                                $dta_penjualan = mysqli_fetch_assoc($penjualan);
                                                echo "<td> $dta_penjualan[unit] Unit </td>";
                                            }
                                        }
                                        $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta[sales_id]'");
                                        $dta_sales = mysqli_fetch_assoc($result_sales);

                                        ?>
                                        <td> <a href=""><?= $dta_sales['nama'] ?></a> </td>
                                    </tr>

                                <?php $i = $i + 1;
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <?php
            require_once '../template/footer.php';
            ?>