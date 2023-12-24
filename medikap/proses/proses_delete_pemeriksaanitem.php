<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
$kode_pasien = (isset($_POST['kode_pasien'])) ? htmlentities($_POST['kode_pasien']) : "";
$ruangan = (isset($_POST['ruangan'])) ? htmlentities($_POST['ruangan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";

if(!empty($_POST['delete_riwayat_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_list_pemeriksaan WHERE id_list_pemeriksaan = '$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus")
        window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pasien.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus")
        window.location="../?x=pemeriksaanitem&pemeriksaan='.$kode_pasien.'&ruangan='.$ruangan.'&pasien='.$pasien.'"</script>';
    }
    }
echo $message;
?>