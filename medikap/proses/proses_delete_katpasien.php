<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$message = "";  // Initialize $message variable

if (!empty($_POST['hapus_riwayat_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM tb_riwayat_pasien WHERE kategori = '$id'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori telah digunakan pada Daftar pasien. Kategori tidak dapat dihapus")
                    window.location="../katpasien"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM tb_kategori_pasien WHERE id_pasien = '$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil dihapus")
                    window.location="../pasien"</script>';
        } else {
            $message = '<script>alert("Data gagal dihapus")
                    window.location="../pasien"</script>';
        }
    }
}
echo $message;
?>
