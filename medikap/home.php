<?php
include "proses/connect.php";

// Fetching data from the database
$query = mysqli_query($conn, "SELECT * FROM tb_riwayat_pasien");
$result = []; // Initialize the $result variable

while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
?>

<div class="col-lg-9 mt-2">
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $rowTombol) {
                $aktif = ($firstSlideButton) ? "active" : "";
                $firstSlideButton = false;
            ?>,.
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
            <?php
                $slide++;
            } ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $row) {
                $aktif = ($firstSlide) ? "active" : "";
                $firstSlide = false;
            ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="assets/img/<?php echo $row['foto'] ?>" class="img-fluid" style="height: 250px; object-fit: cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row['pasien'] ?></h5>
                        <p><?php echo $row['keterangan'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Akhir Carousel -->

    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">MedikaApp - Aplikasi Sistem Informasi Rekam Medis Poli USG</h5>
            <p class="card-text">Aplikasi Pencacatan Data Penyakit Pasien di Poli USG.</p>
            <a href="order" class="btn btn-primary">Tambah Jadwal</a>
        </div>
    </div>
</div>