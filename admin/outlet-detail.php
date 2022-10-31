<?php
require_once '../template/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_outlet WHERE id = '$id'");
$dta = mysqli_fetch_assoc($result);

// $result_perusahaan = mysqli_query($conn, "SELECT * FROM tb_perusahaan WHERE id = '$dta[id_perusahaan]'");
// $dta_perusahaan = mysqli_fetch_assoc($result_perusahaan);

// $loker = mysqli_query($conn, "SELECT * FROM tb_lowongan_pekerjaan WHERE recruiter_id = '$recruiter_id'");

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

                    <h4 class="page-title">Detail Outlet</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="outlet.php">Outlet</a>
                        <li class="active">
                            Detail
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-4">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>Info Outlet <span class="text-muted"></span></b></h4>

                        <div class="text-left">
                            <p class="text-muted font-13"><strong>ID Outlet :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['id_outlet'] ?></span></p>
                            <p class="text-muted font-13"><strong>Nama Outlet :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['nama_outlet'] ?></span></p>
                            <p class="text-muted font-13"><strong>RS :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['rs'] ?></span></p>
                            <p class="text-muted font-13"><strong>Nama Pemilik :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['nama_pemilik'] ?></span></p>
                            <p class="text-muted font-13"><strong>Telpon Pemilik :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['telpon_pemilik'] ?></span></p>
                            <p class="text-muted font-13"><strong>Alamat :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['alamat'] ?></span></p>
                            <p class="text-muted font-13"><strong>Kota :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['kota'] ?></span></p>
                            <p class="text-muted font-13"><strong>Kecamatan :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['kecamatan'] ?></span></p>
                            <p class="text-muted font-13"><strong>Kelurahan :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['kelurahan'] ?></span></p>
                            <p class="text-muted font-13"><strong>Area :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['area'] ?></span></p>
                            <p class="text-muted font-13"><strong>Region :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['region'] ?></span></p>
                            <p class="text-muted font-13"><strong>Branch :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['branch'] ?></span></p>
                            <p class="text-muted font-13"><strong>Syb Branch :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['sub_branch'] ?></span></p>
                            <p class="text-muted font-13"><strong>Cluster :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['cluster'] ?></span></p>
                            <p class="text-muted font-13"><strong>TAP :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['tap'] ?></span></p>
                            <p class="text-muted font-13"><strong>Kategori Jadwal :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['kategori_jadwal'] ?></span></p>
                            <p class="text-muted font-13"><strong>Hari Jadwal :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['hari_jadwal'] ?></span></p>
                            <p class="text-muted font-13"><strong>Salesforce :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['salesforce'] ?></span></p>
                            <p class="text-muted font-13"><strong>Latitude :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['latitude'] ?></span></p>
                            <p class="text-muted font-13"><strong>Longitude :</strong><span class="m-l-15" style="color: darkseagreen ;"><?= $dta['longitude'] ?></span></p>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_GET['tanggal'])) {
                    $tgl = $_GET['tanggal'];
                    $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' AND tanggal = '$tgl' ORDER BY id DESC");
                    $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                } else {
                    $result_kunjungan = mysqli_query($conn, "SELECT * FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC LIMIT 1");
                    $dta_kunjungan = mysqli_fetch_assoc($result_kunjungan);
                }

                $getTanggalKunjungan = mysqli_query($conn, "SELECT tanggal AS tgl FROM tb_kunjungan WHERE outlet_id = '$dta[id]' ORDER BY id DESC");

                ?>

                <form method="POST" action="controller/cont.php" enctype="multipart/form-data">
                    <label class="control-label">Tanggal Kunjungan</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <select name="tanggal" class="form-control">
                                <?php
                                foreach ($getTanggalKunjungan as $dta_tgl) {

                                    if (isset($_GET['tanggal'])) {
                                        $tgl = $_GET['tanggal'];
                                        if ($dta_tgl['tgl'] == $tgl) {
                                            echo "<option selected value='$dta_tgl[tgl]'>$dta_tgl[tgl]</option>";
                                        } else {
                                            echo "<option value='$dta_tgl[tgl]'>$dta_tgl[tgl]</option>";
                                        }
                                    } else {
                                ?>
                                        <option value="<?= $dta_tgl['tgl'] ?>"><?= $dta_tgl['tgl'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?= $id ?> " name="id">
                        <button type="submit" name="cari_tanggal" class="btn btn-danger waves-effect waves-light">Go</button>
                    </div>
                </form>

                <div class="col-lg-8">

                    <!-- INFO KUNJUNGAN -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Info Kunjungan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-6">
                                        <p class="text-muted font-13"><strong>Checkin :</strong><span class="m-l-15" style="color:  ;"><?= $dta_kunjungan['created_at'] ?></span></p>
                                        <p class="text-muted font-13"><strong>Checkout :</strong><span class="m-l-15" style="color:  ;"><?= $dta_kunjungan['updated_at'] ?></span></p>
                                        <?php
                                        $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE id = '$dta_kunjungan[sales_id]'");
                                        $dta_sales = mysqli_fetch_assoc($result_sales);
                                        ?>
                                        <p class="text-muted font-13"><strong>Salesforce :</strong> <a href="salesforce-detail.php?id=<?= $dta_kunjungan['sales_id'] ?>"><span class="m-l-15"><?= $dta_sales['username'] ?></span></a></p>

                                    </div>
                                    <div class="col-sm-6">
                                        <?php
                                        if ($dta_kunjungan['masuk_area'] == "Ya") {
                                            echo "<p class='text-muted font-13'><strong>Masuk Area :</strong><span class=' m-l-15 label label-table label-success'>Ya</span></p>";
                                        } else  if ($dta_kunjungan['masuk_area'] == "Tidak") {
                                            echo "<p class='text-muted font-13'><strong>Masuk Area :</strong><span class=' m-l-15 label label-table label-danger'>Tidak</span></p>";
                                        }
                                        $result_kendala = mysqli_query($conn, "SELECT * FROM tb_kendala WHERE outlet_id = '$id' AND kunjungan_id = '$dta_kunjungan[id]'");
                                        if (mysqli_num_rows($result_kendala) > 0) {
                                            $dta_kendala = mysqli_fetch_assoc($result_kendala);
                                            echo "<p class='text-muted font-13'><strong>Kendala :</strong><a href='https://ganti4g.com/api_sapujagat/upload/kunjungan/$dta_kendala[bukti_foto]' target='_blank'><span class='m-l-15' style='color:  ;'> $dta_kendala[kendala] </span></p>
                                            ";

                                            // <div class='modal fade bs-example-modal-lg' id='myModal-kendala' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' style='display: none;'>
                                            //     <div class='modal-dialog modal-lg'>
                                            //         <div class='modal-content'>
                                            //             <div class='modal-header'>
                                            //                 <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                            //                 <h4 class='modal-title'>Preview Photo</h4>
                                            //             </div>
                                            //             <div class='modal-body'>

                                            //                 <img src='https://ganti4g.com/api_sapujagat/upload/kunjungan/$dta_kendala[bukti_foto]' alt='image' class='img-responsive'>

                                            //             </div>
                                            //             <div class='modal-footer'>
                                            //                 <button type='button' class='btn btn-default waves-effect' data-dismiss='modal'>Close</button>
                                            //             </div>
                                            //         </div>
                                            //     </div>
                                            // </div>
                                        } else {
                                            echo "<p class='text-muted font-13'><strong>Kendala :</strong><span class='m-l-15' style='color:  ;'> - </span></p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PENJUALAN -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-inverse">
                            <h3 class="portlet-title text-dark">
                                Penjualan
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-penjualan"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-penjualan" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <?php
                                $penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE outlet_id = '$id' AND
                                                                                                kunjungan_id = '$dta_kunjungan[id]'");
                                $total = 0;
                                foreach ($penjualan as $dta_penjualan_total) {
                                    $unit1 = $dta_penjualan_total['unit'];
                                    $harga1 = $dta_penjualan_total['harga_satuan'];
                                    $jumlah1 = $unit1 * $harga1;
                                    $total = $total + $jumlah1;
                                }
                                ?>

                                <h3><b>Total : <?= number_format($total) ?></b></h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">#</th>
                                                <th>Produk</th>
                                                <th>Unit</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($penjualan as $dta_penjualan) {
                                                // $mahasiswa_lamaran = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$dta_lamaran[mahasiswa_id]'");
                                                // $dta_mahasiswa_lamaran = mysqli_fetch_assoc($mahasiswa_lamaran);
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td> <a href="produk-penjualan.php"><?= $dta_penjualan['nama_produk'] ?></a> </td>
                                                    <td><?= $dta_penjualan['unit'] ?></td>
                                                    <td><?= number_format($dta_penjualan['harga_satuan']) ?></td>
                                                    <?php
                                                    $unit = $dta_penjualan['unit'];
                                                    $harga = $dta_penjualan['harga_satuan'];
                                                    $jumlah = $unit * $harga;
                                                    ?>
                                                    <td><?= number_format($jumlah) ?></td>
                                                </tr>
                                            <?php
                                                $no = $no + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <!-- <div class="row" style="border-radius: 0px;">
                                        <div class="col-md-3 col-md-offset-8">
                                            <hr>
                                            <h3 class="text-right">USD 2930.00</h3>
                                        </div>
                                    </div> -->
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- SURVEY STOK DAN HARGA -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-inverse">
                            <h3 class="portlet-title text-dark ">
                                Survey Stok dan Harga
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-loker"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-loker" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-pills m-b-30 pull-left">
                                            <li class="active">
                                                <a href="#survey-stok-telkomsel" data-toggle="tab" aria-expanded="true">Telkomsel</a>
                                            </li>
                                            <li class="">
                                                <a href="#survey-stok-indosat" data-toggle="tab" aria-expanded="false">Indosat</a>
                                            </li>
                                            <li class="">
                                                <a href="#survey-stok-tree" data-toggle="tab" aria-expanded="false">Tree</a>
                                            </li>
                                            <li class="">
                                                <a href="#survey-stok-xl" data-toggle="tab" aria-expanded="false">XL</a>
                                            </li>
                                            <li class="">
                                                <a href="#survey-stok-axis" data-toggle="tab" aria-expanded="false">Axis</a>
                                            </li>
                                            <li class="">
                                                <a href="#survey-stok-smartfren" data-toggle="tab" aria-expanded="false">Smartfren</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content br-n pn">

                                            <!-- Harga dan stok Telkoomsel -->
                                            <div id="survey-stok-telkomsel" class="tab-pane active">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_telkomsel_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'Telkomsel'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_telkomsel_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_telkomsel_kosong = mysqli_fetch_assoc($result_stok_telkomsel_kosong);
                                                                    echo "<td>$dta_result_stok_telkomsel_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_telkomsel_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'Telkomsel'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_telkomsel_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_telkomsel_kosong = mysqli_fetch_assoc($result_harga_telkomsel_kosong);
                                                                    $modal = number_format($dta_result_harga_telkomsel_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_telkomsel_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_telkomsel = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Telkomsel' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_telkomsel as $dta_produk_all_operator_telkomsel) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_telkomsel['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_telkomsel['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_telkomsel[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_telkomsel) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_telkomsel = mysqli_fetch_assoc($result_stok_telkomsel);
                                                                            echo "<td>$dta_result_stok_telkomsel[jumlah_produk]</td>";
                                                                        }

                                                                        $result_harga_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_telkomsel[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_telkomsel[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'
                                                                                                                        AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                        if (mysqli_num_rows($result_harga_telkomsel) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_telkomsel = mysqli_fetch_assoc($result_harga_telkomsel);
                                                                            $modal = number_format($dta_result_harga_telkomsel['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_telkomsel['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
                                                                    </tr>

                                                                <?php $i = $i + 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Harga dan stok Indosat -->
                                            <div id="survey-stok-indosat" class="tab-pane">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_indosat_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'Indosat'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_indosat_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_indosat_kosong = mysqli_fetch_assoc($result_stok_indosat_kosong);
                                                                    echo "<td>$dta_result_stok_indosat_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_indosat_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'Indosat'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_indosat_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_indosat_kosong = mysqli_fetch_assoc($result_harga_indosat_kosong);
                                                                    $modal = number_format($dta_result_harga_indosat_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_indosat_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_indosat = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Indosat' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_indosat as $dta_produk_all_operator_indosat) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_indosat['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_indosat['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_indosat = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_indosat[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_indosat[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_indosat) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_indosat = mysqli_fetch_assoc($result_stok_indosat);
                                                                            echo "<td>$dta_result_stok_indosat[jumlah_produk]</td>";
                                                                        }


                                                                        $result_harga_indosat = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_indosat[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_indosat[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_harga_indosat) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_indosat = mysqli_fetch_assoc($result_harga_indosat);
                                                                            $modal = number_format($dta_result_harga_indosat['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_indosat['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
                                                                    </tr>

                                                                <?php $i = $i + 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Harga dan stok Tree -->
                                            <div id="survey-stok-tree" class="tab-pane">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_tree_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'Tree'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_tree_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_tree_kosong = mysqli_fetch_assoc($result_stok_tree_kosong);
                                                                    echo "<td>$dta_result_stok_tree_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_tree_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'Tree'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_tree_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_tree_kosong = mysqli_fetch_assoc($result_harga_tree_kosong);
                                                                    $modal = number_format($dta_result_harga_tree_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_tree_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_tree = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Tree' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_tree as $dta_produk_all_operator_tree) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_tree['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_tree['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_tree = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_tree[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_tree[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_tree) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_tree = mysqli_fetch_assoc($result_stok_tree);
                                                                            echo "<td>$dta_result_stok_tree[jumlah_produk]</td>";
                                                                        }


                                                                        $result_harga_tree = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_tree[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_tree[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_harga_tree) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_tree = mysqli_fetch_assoc($result_harga_tree);
                                                                            $modal = number_format($dta_result_harga_tree['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_tree['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
                                                                    </tr>

                                                                <?php $i = $i + 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Harga dan stok XL -->
                                            <div id="survey-stok-xl" class="tab-pane">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_xl_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'XL'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_xl_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_xl_kosong = mysqli_fetch_assoc($result_stok_xl_kosong);
                                                                    echo "<td>$dta_result_stok_xl_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_xl_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'XL'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_xl_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_xl_kosong = mysqli_fetch_assoc($result_harga_xl_kosong);
                                                                    $modal = number_format($dta_result_harga_xl_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_xl_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_xl = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'XL' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_xl as $dta_produk_all_operator_xl) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_xl['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_xl['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_xl = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_xl[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_xl[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_xl) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_xl = mysqli_fetch_assoc($result_stok_xl);
                                                                            echo "<td>$dta_result_stok_xl[jumlah_produk]</td>";
                                                                        }


                                                                        $result_harga_xl = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_xl[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_xl[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_harga_xl) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_xl = mysqli_fetch_assoc($result_harga_xl);
                                                                            $modal = number_format($dta_result_harga_xl['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_xl['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
                                                                    </tr>

                                                                <?php $i = $i + 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Harga dan stok Axis -->
                                            <div id="survey-stok-axis" class="tab-pane">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_axis_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'Axis'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_axis_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_axis_kosong = mysqli_fetch_assoc($result_stok_axis_kosong);
                                                                    echo "<td>$dta_result_stok_axis_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_axis_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'Axis'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_axis_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_axis_kosong = mysqli_fetch_assoc($result_harga_axis_kosong);
                                                                    $modal = number_format($dta_result_harga_axis_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_axis_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_axis = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Axis' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_axis as $dta_produk_all_operator_axis) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_axis['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_axis['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_axis = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_axis[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_axis[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_axis) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_axis = mysqli_fetch_assoc($result_stok_axis);
                                                                            echo "<td>$dta_result_stok_axis[jumlah_produk]</td>";
                                                                        }


                                                                        $result_harga_axis = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_axis[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_axis[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_harga_axis) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_axis = mysqli_fetch_assoc($result_harga_axis);
                                                                            $modal = number_format($dta_result_harga_axis['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_axis['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
                                                                    </tr>

                                                                <?php $i = $i + 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Harga dan stok Smartfren -->
                                            <div id="survey-stok-smartfren" class="tab-pane">
                                                <div class="row">
                                                    <div class="p-20">
                                                        <table class="table table-striped m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Jenis</th>
                                                                    <th>Nama</th>
                                                                    <th>Stok</th>
                                                                    <th>Harga Modal</th>
                                                                    <th>Harga Jual</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <th scope="row">1</th>
                                                                <td>Perdana</td>
                                                                <td>Perdana Kosong</td>
                                                                <?php
                                                                $result_stok_smartfren_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE provider = 'Smartfren'
                                                                                                                        AND jenis_produk = 'Kosong'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                if (mysqli_num_rows($result_stok_smartfren_kosong) < 1) {
                                                                    echo "<td> - </td>";
                                                                } else {
                                                                    $dta_result_stok_smartfren_kosong = mysqli_fetch_assoc($result_stok_smartfren_kosong);
                                                                    echo "<td>$dta_result_stok_smartfren_kosong[jumlah_produk]</td>";
                                                                }

                                                                $result_harga_smartfren_kosong = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE provider = 'Smartfren'
                                                                                                                AND jenis_produk = 'Kosong'
                                                                                                                AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                AND outlet_id = '$id'
                                                                                                                AND tanggal BETWEEN NOW() - INTERVAL 30 DAY AND NOW()");
                                                                if (mysqli_num_rows($result_harga_smartfren_kosong) < 1) {
                                                                    echo "<td> - </td>
                                                                        <td> - </td>";
                                                                } else {
                                                                    $dta_result_harga_smartfren_kosong = mysqli_fetch_assoc($result_harga_smartfren_kosong);
                                                                    $modal = number_format($dta_result_harga_smartfren_kosong['harga_modal']);
                                                                    $jual = number_format($dta_result_harga_smartfren_kosong['harga_jual']);
                                                                    echo "<td> $modal </td>
                                                                        <td> $jual </td>";
                                                                }
                                                                ?>
                                                                <?php
                                                                $produk_all_operator_smartfren = mysqli_query($conn, "SELECT * FROM tb_produk_all_operator WHERE provider = 'Smartfren' ORDER BY jenis_produk ASC ");
                                                                $i = 2;
                                                                foreach ($produk_all_operator_smartfren as $dta_produk_all_operator_smartfren) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $i ?></th>
                                                                        <td><?= $dta_produk_all_operator_smartfren['jenis_produk'] ?></td>
                                                                        <td><?= $dta_produk_all_operator_smartfren['nama_produk'] ?></td>
                                                                        <?php
                                                                        $result_stok_smartfren = mysqli_query($conn, "SELECT * FROM tb_survey_stok WHERE produk_id = '$dta_produk_all_operator_smartfren[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_smartfren[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_stok_smartfren) < 1) {
                                                                            echo "<td> - </td>";
                                                                        } else {
                                                                            $dta_result_stok_smartfren = mysqli_fetch_assoc($result_stok_smartfren);
                                                                            echo "<td>$dta_result_stok_smartfren[jumlah_produk]</td>";
                                                                        }


                                                                        $result_harga_smartfren = mysqli_query($conn, "SELECT * FROM tb_survey_harga WHERE produk_id = '$dta_produk_all_operator_smartfren[id]'
                                                                                                                        AND provider = '$dta_produk_all_operator_smartfren[provider]'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id'");
                                                                        if (mysqli_num_rows($result_harga_smartfren) < 1) {
                                                                            echo "<td> - </td>
                                                                                <td> - </td>";
                                                                        } else {
                                                                            $dta_result_harga_smartfren = mysqli_fetch_assoc($result_harga_smartfren);
                                                                            $modal = number_format($dta_result_harga_smartfren['harga_modal']);
                                                                            $jual = number_format($dta_result_harga_smartfren['harga_jual']);
                                                                            echo "<td> $modal </td>
                                                                                <td> $jual </td>";
                                                                        }
                                                                        ?>
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
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SURVEY BRANDING -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-inverse">
                            <h3 class="portlet-title text-dark ">
                                Survey Branding
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-branding"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-branding" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="p-20">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table  table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th data-priority="1">Spanduk Rangka</th>
                                                            <th data-priority="1">Spanduk No Rangka</th>
                                                            <th data-priority="1">Papan Harga</th>
                                                            <th data-priority="1">Info Program</th>
                                                            <th data-priority="1">Kursi</th>
                                                            <th data-priority="1">Jam Dinding</th>
                                                            <th data-priority="1">Etalase</th>
                                                            <th data-priority="1">Voucher Fisik</th>
                                                            <th data-priority="1">Kartu Paket</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Branding Telkomse -->
                                                        <tr>
                                                            <th>Telkomsel</th>
                                                            <?php
                                                            $result_branding_telkomsel = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Telkomsel'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
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
                                                            ?>
                                                        </tr>

                                                        <!-- Branding Indosat -->
                                                        <tr>
                                                            <th>Indosat</th>
                                                            <?php
                                                            $result_branding_indosat = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Indosat'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
                                                            if (mysqli_num_rows($result_branding_indosat) < 1) {
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
                                                                foreach ($result_branding_indosat as $dta_result_branding_indosat) {
                                                                    if ($dta_result_branding_indosat['tersedia'] == "Ya") {
                                                                        echo "<td><span class='label label-success'>Yes</span></td>";
                                                                    } else {
                                                                        echo "<td><span class='label label-danger'>No</span></td>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>

                                                        <!-- Branding Tree -->
                                                        <tr>
                                                            <th>Tree</th>
                                                            <?php
                                                            $result_branding_tree = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Tree'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
                                                            if (mysqli_num_rows($result_branding_tree) < 1) {
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
                                                                foreach ($result_branding_tree as $dta_result_branding_tree) {
                                                                    if ($dta_result_branding_tree['tersedia'] == "Ya") {
                                                                        echo "<td><span class='label label-success'>Yes</span></td>";
                                                                    } else {
                                                                        echo "<td><span class='label label-danger'>No</span></td>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>

                                                        <!-- Branding XL -->
                                                        <tr>
                                                            <th>XL</th>
                                                            <?php
                                                            $result_branding_xl = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'XL'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
                                                            if (mysqli_num_rows($result_branding_xl) < 1) {
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
                                                                foreach ($result_branding_xl as $dta_result_branding_xl) {
                                                                    if ($dta_result_branding_xl['tersedia'] == "Ya") {
                                                                        echo "<td><span class='label label-success'>Yes</span></td>";
                                                                    } else {
                                                                        echo "<td><span class='label label-danger'>No</span></td>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>

                                                        <!-- Branding Axis -->
                                                        <tr>
                                                            <th>Axis</th>
                                                            <?php
                                                            $result_branding_axis = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Axis'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
                                                            if (mysqli_num_rows($result_branding_axis) < 1) {
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
                                                                foreach ($result_branding_axis as $dta_result_branding_axis) {
                                                                    if ($dta_result_branding_axis['tersedia'] == "Ya") {
                                                                        echo "<td><span class='label label-success'>Yes</span></td>";
                                                                    } else {
                                                                        echo "<td><span class='label label-danger'>No</span></td>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>

                                                        <!-- Branding Smartfren -->
                                                        <tr>
                                                            <th>Smartfren</th>
                                                            <?php
                                                            $result_branding_smartfren = mysqli_query($conn, "SELECT * FROM tb_survey_branding WHERE provider = 'Smartfren'
                                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                                        AND outlet_id = '$id' ORDER BY no_branding ASC");
                                                            if (mysqli_num_rows($result_branding_smartfren) < 1) {
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
                                                                foreach ($result_branding_smartfren as $dta_result_branding_smartfren) {
                                                                    if ($dta_result_branding_smartfren['tersedia'] == "Ya") {
                                                                        echo "<td><span class='label label-success'>Yes</span></td>";
                                                                    } else {
                                                                        echo "<td><span class='label label-danger'>No</span></td>";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SURVEY PRODUSEN -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-inverse">
                            <h3 class="portlet-title text-dark">
                                Survey Produsen
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-produsen"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-produsen" class="panel-collapse collapse in">
                            <div class="portlet-body">

                                <h4 style="color: aqua ;"><b>Pulsa</b></h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">#</th>
                                                <th>Operator</th>
                                                <th>Distributor Resmi</th>
                                                <th>Aplikasi</th>
                                                <th>Server Luar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $data_operator = array("Telkomsel", "Indosat", "Tree", "XL", "Axis", "Smartfren");
                                            $no = 1;
                                            foreach ($data_operator as $operator) {
                                                echo "
                                                
                                            <tr>
                                                <td> $no </td>
                                                <th> $operator </th>";
                                                $result_produsen_pulsa = mysqli_query($conn, "SELECT * FROM tb_survey_produsen_pulsa WHERE provider = '$operator'
                                                                                                        AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                        AND outlet_id = '$id'
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

                                            ?>
                                                </tr>
                                            <?php
                                                $no = $no + 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <hr>

                                <h4 style="color: aqua ;"><b>Perdana Segel</b></h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Operator</th>
                                                <th>Distributor Resmi</th>
                                                <th>Sulawesi</th>
                                                <th>Kalimantan</th>
                                                <th>Papua/Maluku</th>
                                                <th>Jawa</th>
                                                <th>Bali/NTT</th>
                                                <th>Sumatra</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data_operator = array("Telkomsel", "Indosat", "Tree", "XL", "Axis", "Smartfren");
                                            $no = 1;
                                            foreach ($data_operator as $operator) {
                                            ?>
                                                <tr>
                                                    <th><?= $operator ?></th>
                                                    <?php
                                                    $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Segel'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'
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
                                                    ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <hr>

                                <h4 style="color: aqua ;"><b>Perdana Paket</b></h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Operator</th>
                                                <th>Distributor Resmi</th>
                                                <th>Sulawesi</th>
                                                <th>Kalimantan</th>
                                                <th>Papua/Maluku</th>
                                                <th>Jawa</th>
                                                <th>Bali/NTT</th>
                                                <th>Sumatra</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data_operator = array("Telkomsel", "Indosat", "Tree", "XL", "Axis", "Smartfren");
                                            $no = 1;
                                            foreach ($data_operator as $operator) {
                                            ?>
                                                <tr>
                                                    <th><?= $operator ?></th>
                                                    <?php
                                                    $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Perdana Paket'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'
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
                                                    ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <hr>

                                <h4 style="color: aqua ;"><b>Voucher Fisik</b></h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Operator</th>
                                                <th>Distributor Resmi</th>
                                                <th>Sulawesi</th>
                                                <th>Kalimantan</th>
                                                <th>Papua/Maluku</th>
                                                <th>Jawa</th>
                                                <th>Bali/NTT</th>
                                                <th>Sumatra</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data_operator = array("Telkomsel", "Indosat", "Tree", "XL", "Axis", "Smartfren");
                                            $no = 1;
                                            foreach ($data_operator as $operator) {
                                            ?>
                                                <tr>
                                                    <th><?= $operator ?></th>
                                                    <?php
                                                    $result_produsen_perdana = mysqli_query($conn, "SELECT * FROM tb_survey_produsen WHERE provider = '$operator'
                                                                                                            AND jenis = 'Voucher Fisik'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'
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
                                                    ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>



                            </div>

                        </div>
                    </div>

                    <!-- DOKUMENTASI -->
                    <div class="portlet">
                        <div class="portlet-heading portlet-default bg-inverse">
                            <h3 class="portlet-title text-dark ">
                                Dokumentasi
                            </h3>
                            <div class="portlet-widgets">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-post-dokumentasi"><i class="ion-minus-round"></i></a>
                                <span class="divider"></span>
                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- <br> -->
                        <div id="bg-post-dokumentasi" class="panel-collapse collapse in">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="p-20">
                                        <table class="table table-bordered m-0">

                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Foto 1</th>
                                                    <th>Foto 2</th>
                                                    <th>Foto 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th style="text-align: center ;" scope="row">Depan</th>
                                                    <?php
                                                    $result_dokumentasi_depan_1 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Depan'
                                                                                                            AND urutan = '1'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_depan_1) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_depan_1 = mysqli_fetch_assoc($result_dokumentasi_depan_1);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-depan-1"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_1['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-depan-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_1['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_depan_2 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Depan'
                                                                                                            AND urutan = '2'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_depan_2) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_depan_2 = mysqli_fetch_assoc($result_dokumentasi_depan_2);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-depan-2"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_2['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-depan-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_2['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_depan_3 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Depan'
                                                                                                            AND urutan = '3'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_depan_3) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_depan_3 = mysqli_fetch_assoc($result_dokumentasi_depan_3);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-depan-3"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_3['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-depan-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_depan_3['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: center ;" scope="row">Dalam</th>
                                                    <?php
                                                    $result_dokumentasi_dalam_1 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Dalam'
                                                                                                            AND urutan = '1'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_dalam_1) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_dalam_1 = mysqli_fetch_assoc($result_dokumentasi_dalam_1);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-dalam-1"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_1['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-dalam-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_1['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_dalam_2 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Dalam'
                                                                                                            AND urutan = '2'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_dalam_2) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_dalam_2 = mysqli_fetch_assoc($result_dokumentasi_dalam_2);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-dalam-2"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_2['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-dalam-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_2['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_dalam_3 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Dalam'
                                                                                                            AND urutan = '3'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_dalam_3) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_dalam_3 = mysqli_fetch_assoc($result_dokumentasi_dalam_3);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-dalam-3"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_3['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-dalam-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_dalam_3['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <th style="text-align: center ;" scope="row">Etalase</th>
                                                    <?php
                                                    $result_dokumentasi_etalase_1 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Etalase'
                                                                                                            AND urutan = '1'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_etalase_1) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_etalase_1 = mysqli_fetch_assoc($result_dokumentasi_etalase_1);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-etalase-1"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_1['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-etalase-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_1['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_etalase_2 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Etalase'
                                                                                                            AND urutan = '2'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_etalase_2) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_etalase_2 = mysqli_fetch_assoc($result_dokumentasi_etalase_2);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-etalase-2"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_2['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-etalase-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_2['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_etalase_3 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Etalase'
                                                                                                            AND urutan = '3'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_etalase_3) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_etalase_3 = mysqli_fetch_assoc($result_dokumentasi_etalase_3);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-etalase-3"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_3['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-etalase-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_etalase_3['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <th style="text-align: center ;" scope="row">Harga Jual</th>
                                                    <?php
                                                    $result_dokumentasi_harga_1 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Harga Jual'
                                                                                                            AND urutan = '1'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_harga_1) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_harga_1 = mysqli_fetch_assoc($result_dokumentasi_harga_1);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-harga-1"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_1['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-harga-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_1['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_harga_2 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Harga Jual'
                                                                                                            AND urutan = '2'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_harga_2) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_harga_2 = mysqli_fetch_assoc($result_dokumentasi_harga_2);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-harga-2"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_2['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-harga-2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_2['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $result_dokumentasi_harga_3 = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE jenis_dokumentasi = 'Harga Jual'
                                                                                                            AND urutan = '3'
                                                                                                            AND kunjungan_id = '$dta_kunjungan[id]'
                                                                                                            AND outlet_id = '$id'");
                                                    if (mysqli_num_rows($result_dokumentasi_harga_3) < 1) {
                                                        echo "<td> - </td>";
                                                    } else {
                                                        $dta_result_dokumentasi_harga_3 = mysqli_fetch_assoc($result_dokumentasi_harga_3);
                                                    ?>
                                                        <td> <a href="#" data-toggle="modal" data-target="#myModal-harga-3"> <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_3['nama_foto'] ?>" alt="image" class="img-responsive thumb-lg img-thumbnail"></a></td>

                                                        <div class="modal fade bs-example-modal-lg" id="myModal-harga-3" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h4 class="modal-title">Preview Photo</h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <img src="https://ganti4g.com/api_sapujagat/upload/dokumentasi/<?= $dta_result_dokumentasi_harga_3['nama_foto'] ?>" alt="image" class="img-responsive">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal -->

                                                    <?php
                                                    }
                                                    ?>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

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