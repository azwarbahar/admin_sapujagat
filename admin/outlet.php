<?php
require_once '../template/header.php';

$outlet = mysqli_query($conn, "SELECT * FROM tb_outlet ORDER BY id ASC");

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

                    <h4 class="page-title">Outlet</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li class="active">
                            Data Outlet
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
                                        <h4 class="modal-title">Tambah Outlet</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="controller/controller-outlet.php" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">ID Outlet</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="ID Outlet" name="id_outlet" id="id_outlet">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Outlet</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Outlet" name="nama_outlet" id="nama_outlet">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">RS</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="RS" name="rs" id="rs">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Telpon Pemilik</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="nb-edt form-control" required="" autocomplete="off" placeholder="Telpon Pemilik" name="telpon_pemilik" id="telpon_pemilik">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Alamat" name="alamat" id="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kota</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kota" name="kota" id="kota">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kecamatan" name="kecamatan" id="kecamatan">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kelurahan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kelurahan" name="kelurahan" id="kelurahan">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Area</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Area" name="area" id="area">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Region</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Region" name="region" id="region">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Branch</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Branch" name="branch" id="branch">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sub Branch</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Sub Branch" name="sub_branch" id="sub_branch">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Cluster</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Cluster" name="cluster" id="cluster">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">TAP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="TAP" name="tap" id="tap">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Latitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Latitude" name="latitude" id="latitude">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Longitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Longitude" name="longitude" id="longitude">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Salesforce</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="salesforce" id="salesforce" required>
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        $sales = mysqli_query($conn, "SELECT * FROM tb_sales");
                                                        while ($row = mysqli_fetch_assoc($sales)) {
                                                            echo "<option value='$row[username]'>$row[nama] - $row[username] </option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kategori Jadwal</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control select2" name="kategori_jadwal" id="kategori_jadwal" required>
                                                        <option value="">- Pilih -</option>
                                                        <option value="F1">F1</option>
                                                        <option value="F2">F2</option>
                                                        <option value="F3">F3</option>
                                                        <option value="F4">F4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Hari Kunjungan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="nb-edt form-control" required="" autocomplete="off" placeholder="Hari Kunjungan" name="hari_jadwal" id="hari_jadwal">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="submit_tambah_outlet" class="btn btn-default waves-effect">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- AKHIR MODAL TABAH ADMIN -->

                        <a href="#" class="btn btn-default btn-rounded waves-effect waves-light m-b-30" data-toggle="modal" data-target="#con-close-modal">Tambah Outlet</a>

                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Outlet</th>
                                    <th>Nama</th>
                                    <th>RS</th>
                                    <th>TAP</th>
                                    <th>Salesforce</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $i = 1;
                                foreach ($outlet as $dta) { ?>
                                    <tr>
                                        <td><?= $dta['id_outlet'] ?></td>
                                        <td><?= $dta['nama_outlet'] ?></td>
                                        <td><?= $dta['rs'] ?></td>
                                        <td><?= $dta['tap'] ?></td>
                                        <?php
                                        $result_sales = mysqli_query($conn, "SELECT * FROM tb_sales WHERE username = '$dta[salesforce]'");
                                        $dta_sales = mysqli_fetch_assoc($result_sales);
                                        ?>
                                        <td> <a href="detail-sales.php?id=<?= $dta_sales['id'] ?>"> <?= $dta['salesforce'] ?> </a></td>
                                        <td style="text-align: center;">
                                            <a href="outlet-detail.php?id=<?= $dta['id'] ?>" type="button" class="table-action-btn" style="color: #98a6ad; display: inline-block; width: 24px; border-radius: 50%; text-align: center; line-height: 18px; font-size: 16px;"><i class="md md-visibility"></i></a>
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
                                                    <form method="POST" action="controller/controller-outlet.php" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">ID Outlet</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['id_outlet'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="ID Outlet" name="id_outlet" id="id_outlet">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Outlet</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama_outlet'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Outlet" name="nama_outlet" id="nama_outlet">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">RS</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['rs'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="RS" name="rs" id="rs">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['nama_pemilik'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Nama Pemilik" name="nama_pemilik" id="nama_pemilik">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Telpon Pemilik</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" value="<?= $dta['telpon_pemilik'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Telpon Pemilik" name="telpon_pemilik" id="telpon_pemilik">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['alamat'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Alamat" name="alamat" id="alamat">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kota</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['kota'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kota" name="kota" id="kota">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['kecamatan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kecamatan" name="kecamatan" id="kecamatan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['kelurahan'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Kelurahan" name="kelurahan" id="kelurahan">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Area</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['area'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Area" name="area" id="area">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Region</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['region'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Region" name="region" id="region">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Branch</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['branch'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Branch" name="branch" id="branch">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Sub Branch</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['sub_branch'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Sub Branch" name="sub_branch" id="sub_branch">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Cluster</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['cluster'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Cluster" name="cluster" id="cluster">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">TAP</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['id_outlet'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="TAP" name="tap" id="tap">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Latitude</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['latitude'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Latitude" name="latitude" id="latitude">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Longitude</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['longitude'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Longitude" name="longitude" id="longitude">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Salesforce</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="salesforce" id="salesforce" required>
                                                                    <option value="">- Pilih -</option>
                                                                    <?php
                                                                    $sales = mysqli_query($conn, "SELECT * FROM tb_sales");
                                                                    while ($row = mysqli_fetch_assoc($sales)) {
                                                                        if ($dta['salesforce'] == $row['username']) {
                                                                            echo "<option selected value='$row[username]'>$row[nama] - $row[username] </option>";
                                                                        } else {
                                                                            echo "<option value='$row[username]'>$row[nama] - $row[username] </option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kategori Jadwal</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control select2" name="kategori_jadwal" id="kategori_jadwal" required>
                                                                    <option selected value="<?= $dta['kategori_jadwal'] ?>"><?= $dta['kategori_jadwal'] ?></option>
                                                                    <option value="F1">F1</option>
                                                                    <option value="F2">F2</option>
                                                                    <option value="F3">F3</option>
                                                                    <option value="F4">F4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Hari Kunjungan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" value="<?= $dta['hari_jadwal'] ?>" class="nb-edt form-control" required="" autocomplete="off" placeholder="Hari Kunjungan" name="hari_jadwal" id="hari_jadwal">
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="<?= $dta['id'] ?>">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                                                            <button type="submit" name="edit_outlet" class="btn btn-default waves-effect">Simpan</button>
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
                                                    <h4 class="modal-title" style="color: white;">Hapus Data Outlet</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p style="color: white;">Yakin Ingin Menghapus Data Outlet ?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
                                                    <a href="controller/controller-outlet.php?hapus_outlet=true&id=<?= $dta['id'] ?>" type="button" class="btn btn-outline-dark" style="background-color: white;">Hapus</a>
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