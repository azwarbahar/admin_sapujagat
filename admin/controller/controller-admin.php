<?php

function plugins()
{ ?>
    <link rel="stylesheet" href="../../assets/plugins/bootstrap-more/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/dist/css2/components.css">
    <script src="../../assets/dist/jquery.min.js"></script>
    <script src="../../assets/dist/sweetalert/sweetalert.min.js"></script>
    <?php }
require('../../koneksi.php');


// SUBMIT ADMIN
if (isset($_POST['submit_tambah_admin'])) {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $username = $_POST['username'];
    $jabatan = $_POST['jabatan'];
    $hubungi_kontak = $_POST['hubungi_kontak'];
    if ($hubungi_kontak == "Ya") {
        $hb_kntk = "Ya";
    } else {
        $hb_kntk = "Tidak";
    }
    $default_password = "Sapujagat123";
    $password = password_hash($default_password, PASSWORD_DEFAULT);
    $tap = $_POST['tap'];
    $status = "Active";

    // TAMBAH DATA
    $query = "INSERT INTO tb_admin VALUES (NULL, '$nama', '$nomor_hp', '$username', '$password', '$jabatan', '$tap', NULL, '$hb_kntk', '$status', NULL, NULL)";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Adminsitrator Berhasil ditambah!',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../administrator.php';
                });
            });
        </script>
    <?php }
}

// UPDATE ADMIN
if (isset($_POST['edit_admin'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $username = $_POST['username'];
    $jabatan = $_POST['jabatan'];
    $tap = $_POST['tap'];
    $hubungi_kontak = $_POST['hubungi_kontak'];

    if (isset($_POST['cb_reset_pass-' . $id])) {
        $default_password = "Sapujagat123";
        $password = password_hash($default_password, PASSWORD_DEFAULT);
        $query = "UPDATE tb_admin SET nama = '$nama',
                                        nomor_hp = '$nomor_hp',
                                        username = '$username',
                                        password = '$password',
                                        jabatan = '$jabatan',
                                        tap = '$tap',
                                        hubungi_admin = '$hubungi_kontak',
                                        updated_at = NULL WHERE id = '$id'";
    } else {
        $query = "UPDATE tb_admin SET nama = '$nama',
                                        nomor_hp = '$nomor_hp',
                                        username = '$username',
                                        jabatan = '$jabatan',
                                        tap = '$tap',
                                        hubungi_admin = '$hubungi_kontak',
                                        updated_at = NULL WHERE id = '$id'";
    }

    mysqli_query($conn, $query);
    // EDIT 
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Admin berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../administrator.php';
                });
            });
        </script>
    <?php }
}

// UPDATE PASSWORD ADMIN
if (isset($_POST['submit_password_baru'])) {

    $id_admin_password = $_POST['id_admin_password'];
    $pass_nes = $_POST['pass_nes'];

    $password = password_hash($pass_nes, PASSWORD_DEFAULT);
    $query = "UPDATE tb_admin SET password = '$password',
                                    updated_at = NULL WHERE id = '$id_admin_password'";


    mysqli_query($conn, $query);
    // EDIT 
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil',
                    text: 'Data Password Admin berhasil diubah',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../home.php';
                });
            });
        </script>
    <?php }
}


// HAPUS ADMIN
if (isset($_GET['hapus_admin'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tb_admin WHERE id = '$id'";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        plugins(); ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: 'Berhasil Dihapus',
                    text: 'Data Administrator berhasil dihapus',
                    icon: 'success'
                }).then((data) => {
                    location.href = '../administrator.php';
                });
            });
        </script>
<?php }
}

?>