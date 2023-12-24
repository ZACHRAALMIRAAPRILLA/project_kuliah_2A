<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['selesaipemeriksaan_pemeriksaanitem_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_list_pemeriksaan SET catatan='$catatan', status=2 WHERE id_list_pemeriksaan='$id'");
        if ($query) {
            $message = '<script>alert("Pasien selesai diperiksa");
                        window.location="../dokter"</script>';
        } else {
            $message = '<script>alert("Gagal proses data")
                        window.location="../dokter"</script>';
        }
    }
echo $message;
?>