<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
        <?php
            $koneksi = mysqli_connect("localhost", "root", "", "db_saya")
            or die ("koneksi Gagal");
            $query = mysqli_query($koneksi, "SELECT * FROM liga");
            //$row = mysqli_fetch_array($query);
            while ($row = mysqli_fetch_array($query)){
            echo $row[1]. "<br>";
            }
        ?>
  </body>
  </html>