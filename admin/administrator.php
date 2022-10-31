<?php
require_once '../template/header.php';

$admin = mysqli_query($conn, "SELECT * FROM tb_admin");

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

                    <h4 class="page-title">Administrator</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            Admin
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <!-- MODAL TABAH ADMIN -->
                        <div id="tambah-admin" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                        <h4 class="modal-title">Tambah Akun Admin</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-admin.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Telpon</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nomor Telpon (62..)" name="nomor_hp" id="nomor_hp">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Username" name="username" id="username">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Jabatan" name="jabatan" id="jabatan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">TAP</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="tap" id="tap" required="">
                                                        <option value="-"> - Pilih - </option>
                                                        <option value="TAP GOWA"> TAP GOWA </option>
                                                        <option value="TAP MALINO"> TAP MALINO </option>
                                                        <option value="TAP TAKALAR"> TAP TAKALAR </option>
                                                        <option value="TAP JENEPONTO"> TAP JENEPONTO </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox-signup" name="hubungi_kontak" value="Ya" checked type="checkbox">
                                                        <label for="checkbox-signup">
                                                            Hubungi Kontak Aplikasi
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_admin" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#tambah-admin">Tambah Admin</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>HP</th>
                                    <th>Username</th>
                                    <th>Jabatan</th>
                                    <th>Hubungi Kontak</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($admin as $dta) { ?>

                                    <tr>
                                        <td style="text-align: center;"><?= $no ?></td>
                                        <td><?= $dta['nama'] ?></td>
                                        <td><?= $dta['nomor_hp'] ?></td>
                                        <td><?= $dta['username'] ?></td>
                                        <td><?= $dta['jabatan'] ?></td>
                                        <?php
                                        if ($dta['hubungi_admin'] == "Ya") {
                                            echo "<td style='text-align: center;'><span class='label label-default'> Ya </span></td>";
                                        } else {
                                            echo "<td style='text-align: center;'><span class='label label-danger'> Tidak </span></td>";
                                        }
                                        ?>
                                        <td style="text-align: center;">
                                            <a href="#" type="button" data-toggle="modal" data-target="#edit-<?= $dta['id'] ?>" class="table-action-btn" style="color: #98a6ad; display: inline-block; width: 24px; border-radius: 50%; text-align: center; line-height: 18px; font-size: 16px;"><i class="md md-edit"></i></a>
                                            <a href="#" type="button" data-toggle="modal" data-target="#hapus-<?= $dta['id'] ?>" class="table-action-btn" style="color: #98a6ad; display: inline-block; width: 24px; border-radius: 50%; text-align: center; line-height: 18px; font-size: 16px;"><i class="md md-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!-- MODAL EDIT ADMIN -->
                                    <div id="edit-<?= $dta['id'] ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                                    <h4 class="modal-title">Edit Admin</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="controller/controller-admin.php" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Lengkap" name="nama" id="nama">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nomor Telpon</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['nomor_hp'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nomor Telpon (62..)" name="nomor_hp" id="nomor_hp">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Username</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['username'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Username" name="username" id="username">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['jabatan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Jabatan" name="jabatan" id="jabatan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">TAP</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="tap" id="tap" required="">
                                                                    <?php
                                                                    if ($dta['tap'] == "TAP GOWA") {
                                                                        echo "<option value=''> - Pilih - </option>
                                                                                    <option selected value='TAP GOWA'>TAP GOWA</option>
                                                                                    <option value='TAP MALINO'>TAP MALINO</option>
                                                                                    <option value='TAP TAKALAR'>TAP TAKALAR</option>
                                                                                    <option value='TAP JENEPONTO'>TAP JENEPONTO</option>";
                                                                    } else if ($dta['tap'] == "TAP MALINO") {
                                                                        echo "<option value=''> - Pilih - </option>
                                                                                    <option value='TAP GOWA'>TAP GOWA</option>
                                                                                    <option selected value='TAP MALINO'>TAP MALINO</option>
                                                                                    <option value='TAP TAKALAR'>TAP TAKALAR</option>
                                                                                    <option value='TAP JENEPONTO'>TAP JENEPONTO</option>";
                                                                    } else if ($dta['tap'] == "TAP TAKALAR") {
                                                                        echo "<option value=''> - Pilih - </option>
                                                                                    <option value='TAP GOWA'>TAP GOWA</option>
                                                                                    <option value='TAP MALINO'>TAP MALINO</option>
                                                                                    <option selected value='TAP TAKALAR'>TAP TAKALAR</option>
                                                                                    <option value='TAP JENEPONTO'>TAP JENEPONTO</option>";
                                                                    } else if ($dta['tap'] == "TAP JENEPONTO") {
                                                                        echo "<option value=''> - Pilih - </option>
                                                                                    <option value='TAP GOWA'>TAP GOWA</option>
                                                                                    <option value='TAP MALINO'>TAP MALINO</option>
                                                                                    <option value='TAP TAKALAR'>TAP TAKALAR</option>
                                                                                    <option selected value='TAP JENEPONTO'>TAP JENEPONTO</option>";
                                                                    } else {
                                                                        echo "<option selected value=''> - Pilih - </option>
                                                                                    <option value='TAP GOWA'>TAP GOWA</option>
                                                                                    <option value='TAP MALINO'>TAP MALINO</option>
                                                                                    <option selected value='TAP TAKALAR'>TAP TAKALAR</option>
                                                                                    <option value='TAP JENEPONTO'>TAP JENEPONTO</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Hubungi Kontak</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control" name="hubungi_kontak" id="hubungi_kontak" required="">
                                                                    <?php
                                                                    if ($dta['hubungi_admin'] == "Ya") {
                                                                        echo " <option selected value='Ya'>Ya</option>
                                                                        <option value='Tidak'>Tidak</option>";
                                                                    } else {
                                                                        echo " <option value='Ya'>Ya</option>
                                                                        <option selected value='Tidak'>Tidak</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"></label>
                                                            <div class="col-sm-9">
                                                                <div class="checkbox checkbox-primary">
                                                                    <input id="cb_reset_pass-<?= $dta['id'] ?>" type="checkbox" name="cb_reset_pass-<?= $dta['id'] ?>">
                                                                    <label for="cb_reset_pass-<?= $dta['id'] ?>">
                                                                        Reset Password (Default : Sapujagat123)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_admin" class="btn btn-default waves-effect">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL EDIT ADMIN -->

                                    <!-- MODAL HAPUS -->
                                    <div class="modal fade" id="hapus-<?= $dta['id'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-inverse">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Admin</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Admin ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-admin.php?hapus_admin=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                                <?php
                                    $no = $no + 1;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            require_once '../template/footer.php';
            ?>