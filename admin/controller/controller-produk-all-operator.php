<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT 
if (isset($_POST['submit_tambah_produk_all_operator'])) {
    $provider = $_POST['provider'];
    $nama_produk = $_POST['nama_produk'];
    $jenis_produk = $_POST['jenis_produk'];
    $harga = $_POST['harga'];
    $status = "Active";

    // TAMBAH DATA
    $query = "INSERT INTO tb_produk_all_operator VALUES (NULL, '$provider', '$nama_produk', '$jenis_produk', '$harga', '$status', NULL, NULL)";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Produk All Operator Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-all-operator.php';
                });
            });
        </script>
    <?php }
}

// UPDATE ADMIN
if (isset($_POST['edit_produk_all_operator'])) {

    $id = $_POST['id'];
    $provider = $_POST['provider'];
    $nama_produk = $_POST['nama_produk'];
    $jenis_produk = $_POST['jenis_produk'];
    $harga = $_POST['harga'];

    $query = "UPDATE tb_produk_all_operator SET provider = '$provider',
											nama_produk = '$nama_produk',
											jenis_produk = '$jenis_produk',
											harga = '$harga',
											updated_at = NULL WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Produk All Operator berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-all-operator.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_produk_all_operator'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_produk_all_operator WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Produk All Operator berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-all-operator.php';
                });
            });
        </script>
<?php }
}

?>