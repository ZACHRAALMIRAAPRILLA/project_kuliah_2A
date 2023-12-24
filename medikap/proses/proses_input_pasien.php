<?php
include "connect.php";
$nama_pasien = (isset($_POST['nama_pasien'])) ? htmlentities($_POST['nama_pasien']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kat_pasien = (isset($_POST['kat_pasien'])) ? htmlentities($_POST['kat_pasien']) : "";
$hasil = (isset($_POST['hasil'])) ? htmlentities($_POST['hasil']) : "";

$kode_rand = rand(10000,99999)."-";
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_POST['input_pasien_validate'])) {
    //cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, file yang dimasukkan telah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500Kb
                $message = "File foto yang diupload terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != 'jpg' && $imageType != 'png' && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, GIF";
                $statusUpload = 0;
            }
        }
    }
}
    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload");
                window.location="../menu"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_riwayat_pasien WHERE nama_pasien = '$nama_pasien'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama pasien yang dimasukkan telah ada");
                        window.location="../pasien"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_riwayat_pasien (foto,nama_pasien,keterangan,kategori,hasil6557,stok) values('" . $kode_rand. $_FILES['foto']['pasien'] . "','$nama_pasien','$keterangan','$kat_pasien','$hasil')");
                if ($query) {
                    $message = '<script>alert("Data berhasil dimasukkan");
                            window.location="../pasien"</script>';
                } else {
                    $message = '<script>alert("Data gagal dimasukkan");
                            window.location="../pasien"</script>';
                }
            } else {
                $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload");
                                window.location="../user"</script>';
            }
        }
    }
}
echo $message;
?>