<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['terima_pemeriksaanitem_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_list_pemeriksaan SET catatan='$catatan', status=1 WHERE id_list_pemeriksaan='$id'");
        if ($query) {
            $message = '<script>alert("Berhasil terima Pemeriksaan oleh dokter");
                        window.location="../dokter"</script>';
        } else {
            $message = '<script>alert("Gagal terima Pasien oleh dokter")
                        window.location="../dokter"</script>';
        }
    }
echo $message;
?>