<!--pemakaian fungsi udf : berisi nilai balik * menggunakan return-->

<?php
function psgpjg ($pjg,$lbr) {
    $luas = $pjg * $lbr; //menghitung luas persegi panjang //kurangnya rumus sehingga programnya tidak jalan//
    return $luas;
}
$pjg = 5;
$lbr = 3;
echo "luas persegi panjang dengan pjg 5 dan lebar 3 =";
echo Psgpjg($pjg,$lbr);
?>