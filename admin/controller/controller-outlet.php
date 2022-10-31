<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT OUTELT
if (isset($_POST['submit_tambah_outlet'])) {
    $id_outlet = $_POST['id_outlet'];
    $nama_outlet = $_POST['nama_outlet'];
    $rs = $_POST['rs'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $telpon_pemilik = $_POST['telpon_pemilik'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $area = $_POST['area'];
    $region = $_POST['region'];
    $branch = $_POST['branch'];
    $sub_branch = $_POST['sub_branch'];
    $cluster = $_POST['cluster'];
    $tap = $_POST['tap'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $salesforce = $_POST['salesforce'];
    $kategori_jadwal = $_POST['kategori_jadwal'];
    $hari_jadwal = $_POST['hari_jadwal'];
    $status = "Active";

    // TAMBAH DATA
    $query = "INSERT INTO tb_outlet VALUES (NULL, '$nama_outlet', '$id_outlet', '$nama_pemilik', 
                                            '$telpon_pemilik', '$rs', '$alamat', 
                                            '$kota', '$kecamatan', '$kelurahan', 
                                            '$area', '$region', '$branch', 
                                            '$sub_branch', '$cluster', '$kategori_jadwal', 
                                            '$hari_jadwal', '$salesforce', '$tap', 
                                            '$latitude', '$longitude', '$status', NULL, NULL)";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Outlet Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../outlet.php';
                });
            });
        </script>
    <?php }
}

// UPDATE ADMIN
if (isset($_POST['edit_outlet'])) {

    $id = $_POST['id'];
    $id_outlet = $_POST['id_outlet'];
    $nama_outlet = $_POST['nama_outlet'];
    $rs = $_POST['rs'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $telpon_pemilik = $_POST['telpon_pemilik'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $area = $_POST['area'];
    $region = $_POST['region'];
    $branch = $_POST['branch'];
    $sub_branch = $_POST['sub_branch'];
    $cluster = $_POST['cluster'];
    $tap = $_POST['tap'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $salesforce = $_POST['salesforce'];
    $kategori_jadwal = $_POST['kategori_jadwal'];
    $hari_jadwal = $_POST['hari_jadwal'];
    $status = "Active";

    $query = "UPDATE tb_outlet SET nama_outlet = '$nama_outlet',
									id_outlet = '$id_outlet',
									nama_pemilik = '$nama_pemilik',
									telpon_pemilik = '$telpon_pemilik',
									rs = '$rs',
									alamat = '$alamat',
									kota = '$kota',
									kecamatan = '$kecamatan',
									kelurahan = '$kelurahan',
									area = '$area',
									region = '$region',
									branch = '$branch',
									sub_branch = '$sub_branch',
									cluster = '$cluster',
									kategori_jadwal = '$kategori_jadwal',
									hari_jadwal = '$hari_jadwal',
									salesforce = '$salesforce',
									tap = '$tap',
									latitude = '$latitude',
									longitude = '$longitude',
									status = '$status',
									updated_at = NULL WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Outlet berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../outlet.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_outlet'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_outlet WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Outlet berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../outlet.php';
                });
            });
        </script>
<?php }
}

?>