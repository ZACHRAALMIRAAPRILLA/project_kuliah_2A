<!--pemakaian fungsi built-in : string-->

<?php
$str = "belajar php ternyata menyenangkan";
echo strtolower($str); //ubah huruf ke kecil semua
echo "<br>";
echo strtoupper($str); //ubah huruf ke besar semua
echo "<br>";
echo str_replace("menyenangkan","mudah lho",$str); //mengganti string
?>