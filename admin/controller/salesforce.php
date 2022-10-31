<?php
require_once '../template/header.php';

$sales = mysqli_query($conn, "SELECT * FROM tb_sales");

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

                    <h4 class="page-title">Salesforce</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li class="active">
                            Data Salesforce
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
                                        <h4 class="modal-title">Tambah Salesforce</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-salesforce.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Username" name="username" id="username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Hp</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nomor Hp" name="telpon" id="telpon">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">TAP</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="tap" id="tap" required="">
                                                        <option value="">- Pilih -</option>
                                                        <option value="GOWA">GOWA</option>
                                                        <option value="MALINO">MALINO</option>
                                                        <option value="TAKALAR">TAKALAR</option>
                                                        <option value="JENEPONTO">JENEPONTO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_salesforce" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah Salesforce</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>TAP</th>
                                    <th>Telpon</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>

                                <?php $i = 1;
                                foreach ($sales as $dta) { ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="../assets/images/avatar-1.jpg" alt="image" class="img-circle  thumb-sm ">
                                        </td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['tap'] ?></td>
                                        <td><?= $dta['telpon'] ?></td>
                                        <td><?= $dta['username'] ?></td>
                                        <td style="text-align: center;"><span class="label label-default"> <?= $dta['status'] ?> </span></td>
                                        <td style="text-align: center;">
                                            <a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="btn table-action-btn waves-effect waves-light"><i class="md md-close"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" tabindex="-1" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Salesforce</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Salesforce ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-salesforce.php?hapus_salesforce=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
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