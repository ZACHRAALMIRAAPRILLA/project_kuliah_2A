<?php
session_start();
include "connect.php";
$kode_pasien = (isset($_POST['kode_pasien'])) ? htmlentities($_POST['kode_pasien']) : "";
$antrian = (isset($_POST['antrian'])) ? htmlentities($_POST['antrian']) : "";
$pasien = (isset($_POST['pasien'])) ? htmlentities($_POST['pasien']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembalian = $uang - $total;

if (!empty($_POST['bayar_validate'])) {
    if ($kembalian < 0) {
        $message = '<script>alert("Nominal uang tidak mencukupi");
        window.location="../?x=orderitem&order=' . $kode_pasien . '&antriann=' . $antrian . '&pasien=' . $pasien . '"</script>';
    } else {
            $query = mysqli_query($conn, "INSERT INTO tb_pembayaran (id_bayar,nominal_uang,total_bayar) values('$kode_pasien','$uang','$total')");
            if ($query) {
                $message = '<script>alert("Pembayaran berhasil \nUang kembalian Rp. '.$kembalian.'");
                        window.location="../?x=orderitem&order=' . $kode_pasien . '&antrian=' . $antrian . '&pasien=' . $pasien . '"</script>';
            } else {
                $message = '<script>alert("Pembayaran gagal")
                        window.location="../?x=orderitem&order=' . $kode_pasien . '&antrian=' . $antrian . '&pasien=' . $pasien . '"</script>';
            }
        }
    }
echo $message;
