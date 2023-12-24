<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$kode_pemeriksaan = (isset($_POST['kode_pemeriksaan'])) ? htmlentities($_POST['kode_pemeriksaan']) : "";
$ruangan = (isset($_POST['ruangan'])) ? htmlentities($_POST['ruangan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";


if (!empty($_POST['edit_pemeriksaanitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_pemeriksaan WHERE pasien ='$pasien' && kode_pemeriksaan='$kode_pemeriksaan' && id_list_pemeriksaan != $id");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Data Pemeriksaan yang dimasukkan telah ada");
                    window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pemeriksaan.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_list_pemeriksaan SET pasien='$pasien',jumlah='$jumlah',catatan='$catatan' WHERE id_list_pemeriksaan='$id'");
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