<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$jenispasienn = (isset($_POST['jenispasien'])) ? htmlentities($_POST['jenispasien']) : "";
$katpasien = (isset($_POST['katpasien'])) ? htmlentities($_POST['katpasien']) : "";

if(!empty($_POST['input_katpasien_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_pasien FROM tb_kategori_pasien WHERE kategori_pasien = '$katpasien'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori Pasien yang dimasukkan telah ada")
        window.location="../katpasien"</script>';
    } else {
    $query = mysqli_query($conn, "UPDATE tb_kategori_pasien SET jenis_pasien='$jenispasien', kategori_pasien='$katpasien' WHERE id_kat_pasien='$id'");
    if($query){
        $message = '<script>alert("Data berhasil diupdate")
                    window.location="../katpasien"</script>';
    }else{
        $message = '<script>alert("Data gagal diupdate")
                    window.location="../katpasien"</script>';
    }
}
}echo $message;
?>