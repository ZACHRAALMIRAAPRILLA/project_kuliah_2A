<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;
$kode_pasien = (isset($_POST['kode_pasien'])) ? htmlentities($_POST['kode_pasien']) : "";
$meja = (isset($_POST['antrian'])) ? htmlentities($_POST['antrian']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";

if(!empty($_POST['delete_riwayat_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order = '$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus")
        window.location="../?x=orderitem&order='.$kode_pasien.'&antrian='.$antrian.'&pasien='.$pasien.'"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus")
        window.location="../?x=orderitem&order='.$kode_pasien.'&antrian='.$antrian.'&pasien='.$pasien.'"</script>';
    }
    }
echo $message;
?>