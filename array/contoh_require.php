<!--modularisasi menggunakan require-->
<!--a simpan file berikut dengan nama : contoh_require.php-->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zachra_Almira_Aprilla</title>
</head>
<body>
    <?php
    require("modularisasi.php");
    echo "<br>";
    tulistebal("Ini adalah tulisan tebal");   //memanggil fungsi dan memberikan parameter
    echo "<br>";
    echo $a;
?>
</body>
</html>