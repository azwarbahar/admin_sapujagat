<?php

if (isset($_POST['cari_tanggal'])) {
    $tanggal = $_POST['tanggal'];
    $id = $_POST['id'];
    header('Location: ../outlet-detail.php?id=' . $id . '&tanggal=' . $tanggal);
}
