<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="proses.php">
        <label>Nilai 1</label>
        <input type="text" name="nilai1">
        <br/>
        <label>Nilai 2</label>
        <input type="text" name="nilai2">

        <input type="submit" value="PROSES" />
    </form>
</body>
</html>

<?php
    //echo $_GET['nilai1']." dan ".$_GET['nilai2'] ."<br/>";
    if (isset($_REQUEST['nilai1'])){
        $nilai1 = $_REQUEST['nilai1'];
    }
    else {
        $nilai1 = 0;
    }

    if (!empty($_REQUEST['nilai2'])){
        $nilai2 = $_REQUEST['nilai2'];
    }
    else {
        $nilai2 = 0;
    } 

    echo "Jumlah dari ".$nilai1." ditambah dengan ".$nilai2. " adalah " .$nilai1+$nilai2;
?>