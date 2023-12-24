<?php
include "connect.php";

$jenispasien = (isset($_POST['jenispasien'])) ? (int)$_POST['jenispasien'] : 0;  // Sesuaikan dengan tipe data yang benar
$katpasien = (isset($_POST['katpasien'])) ? htmlentities($_POST['katpasien']) : "";

if (!empty($_POST['input_katpasien_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_pasien FROM tb_kategori_pasien WHERE kategori_pasien = '$katpasien'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan telah ada")
                    window.location="../katpasien"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_kategori_pasien (jenis_pasien, kategori_pasien) VALUES ($jenispasien, '$katpasien')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan")
                        window.location="../katpasien"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
                        window.location="../katpasien"</script>';
        }
    }
}
echo $message;
?>
