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
if (isset($_POST['submit_tambah_produk_penjualan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $masa_berlaku = $_POST['masa_berlaku'];

    // TAMBAH DATA
    $query = "INSERT INTO tb_produk_penjualan VALUES (NULL, '$nama', '$harga', '$masa_berlaku', NULL, NULL)";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Produk Penjualan Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-penjualan.php';
                });
            });
        </script>
    <?php }
}

// UPDATE ADMIN
if (isset($_POST['edit_produk_penjualan'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $masa_berlaku = $_POST['masa_berlaku'];

    $query = "UPDATE tb_produk_penjualan SET nama = '$nama',
											harga = '$harga',
											masa_berlaku = '$masa_berlaku',
											updated_at = NULL WHERE id = '$id'";
    mysqli_query($conn, $query);
    // EDIT PARTAI
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Produk Penjualan berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-penjualan.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_produk_penjualan'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_produk_penjualan WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Produk Penjualan berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../produk-penjualan.php';
                });
            });
        </script>
<?php }
}

?>