<!--b. buat file untuk memanggil nama file di atas //include-->



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nazila_fitria</title>
</head>
<body>
    <?php
    for ($b = 1; $b < 5; $b++) {
        include("contoh13.php");
        // include bisa dipanggil lebih dari 1x
    }
    ?>
</body>
</html>