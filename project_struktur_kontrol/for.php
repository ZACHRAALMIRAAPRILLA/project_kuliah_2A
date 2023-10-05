<!DOCTYPE html>
<html>
<head>
    <title>Mencari Jumlah Huruf Vokal</title>
</head>
<body>
    <h1>Mencari jumlah huruf vokal dalam suatu kata</h1>
    
    <?php
    $kata = "Belajar PHP"; // Kata yang ingin dihitung huruf vokalnya
    $hurufDicari = "aeiou"; // Huruf vokal yang dicari (a, e, i, o, u)
    $jumlah = 0;

    echo "Kata: " . $kata . "<br>";
    
    for ($i = 0; $i < strlen($kata); $i++) {
        $karakter = strtolower(substr($kata, $i, 1)); // Mengubah karakter menjadi huruf kecil untuk perbandingan
        if (strpos($hurufDicari, $karakter) !== false) {
            $jumlah++;
        }
    }
    
    echo "Jumlah huruf vokal dalam kata " . $kata . " : " . $jumlah;
    ?>
</body>
</html>
