<?php
session_start();
include "connect.php";
$kode_pemeriksaan = (isset($_POST['kode_pemeriksaan'])) ? htmlentities($_POST['kode_pemeriksaan']) : "";
$ruangan = (isset($_POST['ruangan'])) ? htmlentities($_POST['ruangan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";

if (!empty($_POST['input_pemeriksaan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_pemeriksaan WHERE id_pasien = '$kode_pemeriksaan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Pasien yang dimasukkan telah ada");
                    window.location="../pemeriksaan"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pemeriksaan (id_pemeriksaan,ruangan,pasien,perawat) values('$kode_pemeriksaan','$ruangan','$pasien','$_SESSION[id_medikaapp]')");
        if ($query) {
            $message = '<script>alert("Data Pasien berhasil dimasukkan");
                        window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pemeriksaan.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
        } else {
            $message = '<script>alert("Data Pasien gagal dimasukkan")</script>';
        }
    }
}
echo $message;
?>