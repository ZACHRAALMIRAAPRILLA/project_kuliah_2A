<?php
session_start();
include "connect.php";
$kode_pemeriksaan = (isset($_POST['kode_pemeriksaan'])) ? htmlentities($_POST['kode_pemeriksaan']) : "";
$meja = (isset($_POST['ruangan'])) ? htmlentities($_POST['ruangan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$jadwal = (isset($_POST['jadwal'])) ? htmlentities($_POST['jadwal']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";


if (!empty($_POST['input_pemeriksaanitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_pemeriksaan WHERE pasien ='$pasien' && kode_pemeriksaan='$kode_pemeriksaan'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Pasien sudah terdaftar");
                    window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pemeriksaan.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_list_pemeriksaan (pasien,kode_pemeriksaan,jumlah,catatan) values('$pasien','$kode_pemeriksaan','$jumlah','$catatan')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
                        window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pemeriksaan.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
                        window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pemeriksaan.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
        }
    }
}
echo $message;
?>