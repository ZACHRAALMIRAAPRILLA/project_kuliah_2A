<?php
session_start();
include "connect.php";
$kode_pemeriksaan = (isset($_POST['kode_pemeriksaan'])) ? htmlentities($_POST['kode_pemeriksaan']) : "";
$ruangan = (isset($_POST['ruangan'])) ? htmlentities($_POST['ruangan']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";

if (!empty($_POST['edit_pemeriksaan_validate'])) {
    
        $query = mysqli_query($conn, "UPDATE tb_pemeriksaan SET ruangan='$ruangan',pasien='$pasien' WHERE id_pemeriksaan = $kode_pemeriksaan");
        
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
                        window.location="../pemeriksaan"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
                        window.location="../pemeriksaan"</script>';
        }
    }
echo $message;
?>