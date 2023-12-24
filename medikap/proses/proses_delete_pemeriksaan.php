<?php
include "connect.php";
$kode_pasien = (isset($_POST['kode_pasien'])) ? htmlentities($_POST['kode_pasien']) : "" ;

if(!empty($_POST['delete_pemeriksaan_validate'])){
    $select = mysqli_query($conn, "SELECT kode_pasien FROM tb_list_pemeriksaan WHERE kode_pasien = '$kode_pasien'");
    if(mysqli_num_rows($select) > 0 ){
        $message = '<script>alert("Dokter telah memiliki jadwal, pasien ini dialihkan");
                    window.location="../pasien"</script>';
    }else{

    $query = mysqli_query($conn, "DELETE FROM tb_pasien WHERE id_pasien = '$kode_pasien'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus")
                    window.location="../pemeriksaan"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus")
                    window.location="../pemeriksaan"</script>';
        }
    }
}echo $message;
?>