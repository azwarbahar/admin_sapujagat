<?php
require_once '../template/header.php';

$produk_penjualan = mysqli_query($conn, "SELECT * FROM tb_produk_penjualan");

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

                    <h4 class="page-title">Produk Penjualan</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Produk</a>
                        </li>
                        <li class="active">
                            Data Produk Penjualan
                        </li>
                    </ol>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">



                        <!-- MODAL TABAH ADMIN -->
                        <div id="con-close-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Produk Penjualan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-produk-penjualan.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Produk</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Produk" name="nama" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Harga</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Harga" name="harga" id="harga">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Masa Berlaku (Hari)</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Masa Berlaku" name="masa_berlaku" id="masa_berlaku">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_produk_penjualan" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah Produk Penjualan</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Masa Berlaku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($produk_penjualan as $dta) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['harga'] ?></td>
                                        <td><?= $dta['masa_berlaku'] ?> Hari</td>
                                        <td style="text-align: center;">
                                            <a href="#" type="button" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="table-action-btn" style="color: #98a6ad; display: inline-block; width: 24px; border-radius: 50%; text-align: center; line-height: 18px; font-size: 16px;"><i class="md md-edit"></i></a>
                                            <a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="table-action-btn" style="color: #98a6ad; display: inline-block; width: 24px; border-radius: 50%; text-align: center; line-height: 18px; font-size: 16px;"><i class="md md-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT  -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Edit Outlet</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-produk-penjualan.php" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Produk</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Produk" name="nama" id="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Harga</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['harga'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Harga" name="harga" id="harga">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Masa Berlaku (Hari)</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['masa_berlaku'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Masa Berlaku" name="masa_berlaku" id="masa_berlaku">
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_produk_penjualan" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT -->

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Produk Penjualan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Produk Penjualan ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-produk-penjualan.php?hapus_produk_penjualan=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

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