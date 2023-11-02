<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Buku Tamu</title>
</head>
<body>
    <?php
    // Pastikan hanya mengeksekusi kode jika ada data POST yang diterima
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Periksa apakah input 'kolom' dan 'cari' sudah diisi
        if (isset($_POST['kolom']) && isset($_POST['cari'])) {
            $kolom = $_POST['kolom'];
            $cari = $_POST['cari'];

            // Buat koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "db_saya");

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi ke database gagal: " . mysqli_connect_error());
            }

            // Lindungi input dari potensi serangan SQL Injection
            $kolom = mysqli_real_escape_string($conn, $kolom);
            $cari = mysqli_real_escape_string($conn, $cari);

            // Buat query SQL dengan prepared statement
            $query = "SELECT * FROM bukutamu WHERE $kolom LIKE '%$cari%'";
            $hasil = mysqli_query($conn, $query);

            if (!$hasil) {
                die("Query gagal: " . mysqli_error($conn));
            }

            $jumlah = mysqli_num_rows($hasil);
            echo "<br>";
            echo "Ditemukan : $jumlah";
            echo "<br>";

            while ($baris = mysqli_fetch_array($hasil)) {
                echo "<br>";
                echo "Nama : " . htmlspecialchars($baris[0]);
                echo "<br>";
                echo "Email : " . htmlspecialchars($baris[1]);
                echo "<br>";
                echo "Komentar : " . htmlspecialchars($baris[2]);
                echo "<br>";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
        } else {
            echo "Kolom dan kata kunci pencarian harus diisi.";
        }
    } else {
        echo "Ditemukan = 0.";
    }
    ?>
</body>
</html>
