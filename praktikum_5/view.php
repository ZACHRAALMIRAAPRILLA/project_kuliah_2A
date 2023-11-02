<?php
// Buat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_saya");

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Lakukan query ke database
$hasil = mysqli_query($conn, "SELECT * FROM bukutamu");

// Periksa apakah query berhasil
if (!$hasil) {
    die("Query gagal: " . mysqli_error($conn));
}

// Hitung jumlah pengunjung
$jumlah = mysqli_num_rows($hasil);

echo "<center><h1>Daftar Pengunjung</h1></center>";
echo "<p>Jumlah pengunjung: $jumlah</p>";

$a = 1;

while ($baris = mysqli_fetch_array($hasil)) {
    echo "<br>";
    echo "<strong>Pengunjung ke-$a</strong>";
    echo "<br>";
    echo "Nama: " . htmlspecialchars($baris[0]);
    echo "<br>";
    echo "Email: " . htmlspecialchars($baris[1]);
    echo "<br>";
    echo "Komentar: " . htmlspecialchars($baris[2]);
    echo "<br>";
    $a++;
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
