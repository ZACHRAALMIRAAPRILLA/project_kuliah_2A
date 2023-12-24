<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_pemeriksaan.*,tb_pembayaran.*,nama, SUM(harga*jumlah) AS harganya FROM tb_pemeriksaan
    LEFT JOIN tb_user ON tb_user.id = tb_pemeriksaan.perawat
    LEFT JOIN tb_list_pemeriksaan ON tb_list_pemeriksaan.kode_pemeriksaan = tb_pemeriksaan.id_pemeriksaan
    LEFT JOIN tb_riwayat_pasien ON tb_riwayat_pasien.id_pasien = tb_list_pemeriksaan.pasien
    LEFT JOIN tb_pembayaran ON tb_pembayaran.id_bayar = tb_pemeriksaan.id_pemeriksaan

    GROUP BY id_pemeriksaan ORDER BY waktu_pemeriksaan DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

//$select_kat_pasien = mysqli_query($conn, "SELECT id_kat_pasien,kategori_pasien FROM tb_kategori_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Report
        </div>
        <div class="card-body">
        
        <?php
        if (empty($result)) {
            echo "Data Kategori Pasien tidak ada";
        } else {
            foreach ($result as $row) { 
                ?>
            <?php
            }
            ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Pemeriksaan</th>
                            <th scope="col">Waktu Pemeriksaan</th>
                            <th scope="col">Waktu Pembayaran</th>
                            <th scope="col">Pasien</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Perawat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td>
                                    <?php echo $row['id_pemeriksaan'] ?>
                                </td>
                                <td>
                                    <?php echo $row['waktu_pemeriksaan'] ?>
                                </td>
                                <td>
                                    <?php echo $row['waktu_bayar'] ?>
                                </td>
                                </div>
                                <td>
                                    <?php echo $row['pasien'] ?>
                                </td>
                                <td>
                                    <?php echo $row['ruangan'] ?>
                                </td>
                                <td>
                                    <?php echo number_format((int)$row['harganya'],0,',','.') ?>
                                </td>
                                <td>
                                    <?php echo $row['nama'] ?>
                                </td>
            
            <td>
                <div class="d-flex">
                    <a class="btn btn-info btn-sm me-1" href="./?x=viewitem&pemeriksaan=<?php echo $row['id_pemeriksaan'] . "&ruangan=" . $row['ruangan'] . "&pasien=" . $row['pasien'] ?>"><i class="bi bi-eye"></i></a>
                </div>
            </td>
            </tr>
        <?php
                        }
        ?>
        </tbody>
        </table>
    </div>
<?php
        }
?>
</div>
</div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>