<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_pemeriksaan
    LEFT JOIN tb_pemeriksaan ON tb_pemeriksaan.id_pemeriksaan = tb_list_pemeriksaan.kode_pemeriksaan
    LEFT JOIN tb_riwayat_pasien ON tb_riwayat_pasien.id = tb_list_pemeriksaan.pasien
    LEFT JOIN tb_pembayaran ON tb_pembayaran.id_pembayaran = tb_pemeriksaan.id_pemerksaan

    GROUP BY id_list_pemeriksaan
    HAVING tb_list_pemeriksaan.kode_pemeriksaan = $_GET[pemeriksaan]");

$kode = $_GET['pemeriksaan'];
$ruangan = $_GET['ruangan'];
$pasien = $_GET['pasien'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT id,nama_pasien FROM tb_riwayat_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman View Item
        </div>
        <div class="card-body">
            <a href="report" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadFoto">Kode Pemeriksaan</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="ruangan" value="<?php echo $ruangan; ?>">
                        <label for="uploadFoto">Ruangan</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="pasien" value="<?php echo $pasien; ?>">
                        <label for="uploadFoto">Pasien</label>
                    </div>
                </div>
            </div>

            
            <?php
            if (empty($result)) {
                echo "Data riwayat pasien tidak ada";
            } else {
                foreach ($result as $row) { ?>
                    
                <?php
                }
                ?>

               

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Pasien</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nama_pasien'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if ($row['status']==1){
                                            echo "<span class='badge text-bg-warning'>Masuk ke pemeriksaan</span>";
                                        }elseif ($row['status']==2){
                                            echo "<span class='badge text-bg-primary'>Selesai pemeriksaan</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
            
        </div>
    </div>
</div>