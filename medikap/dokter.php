<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_pemeriksaan
    LEFT JOIN tb_pemeriksaan ON tb_pemerikksaan.id_pemeriksaan = tb_list_pemeriksaan.kode_pemeriksaan
    LEFT JOIN tb_riwayat_pasien ON tb_riwayat_pasien.id = tb_list_pemeriksaan.pasien
    LEFT JOIN tb_pembayaran ON tb_pembayaran.id_bayar = tb_pemeriksaan.id_pemeriksaan 
    ORDER BY waktu_order DESC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_pasien = mysqli_query($conn, "SELECT id, nama_pasien FROM tb_riwayat_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Dokter
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Data Riwayat Pasien Tidak Ada";
            } else {
                foreach ($result as $row) { ?>
                    <!-- Modal Terima -->
                    <div class="modal fade" id="terima<?php echo $row['id_list_pemeriksaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar Pasien</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_pemeriksaan.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_pemeriksaan'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="Pasien" id="">
                                                        <option selected hidden value="">Pilih Jadwal Pasien</option>
                                                        <?php
                                                        foreach ($select_pasien as $value) {
                                                            if ($row['pasien'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_pasien]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_pasien]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="Pasien" for="uploadFoto">Pasien Rujukan, Rawat Inap </label>
                                                    <div class="invalid-feedback">
                                                        Pilih Pasien
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah Pasien" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">Jumlah Pasien</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah Pasien
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="catatan">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="terima_pemeriksaanitem_validate" value="12345">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal diTerima Dokter-->

                    <!-- Modal Selesai Diperiksa-->
                    <div class="modal fade" id="selesai_pemeriksaan<?php echo $row['id_list_pemeriksaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Selesai Diperiksa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_selesai_pemeriksaan.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_pemeriksaan'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="Pasien" id="">
                                                        <option selected hidden value="">Pilih Pasien</option>
                                                        <?php
                                                        foreach ($select_pasien as $value) {
                                                            if ($row['pasien'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_pasien]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_pasien]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="Pasien" for="uploadFoto">Hasil Pemeriksaan</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Nama Pasien
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="Jumlah Pasien" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">Jumlah Porsi</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah Pasien
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="catatan">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="proses_selesai_pemeriksaan_validate" value="12345">Selesai di Periksa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Selesai Pemeriksaan-->
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
                                <th scope="col">Pasien</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                                foreach ($result as $row) {
                                    if ($row['status'] != 2) {
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['kode_pemeriksaan'] ?></td>
                                    <td><?php echo $row['waktu_pemeriksaan'] ?></td>
                                    <td><?php echo $row['nama_pasien'] ?></td>
                                    <td><?php echo $row['jumlah'] ?></td>
                                    <td><?php echo $row['catatan'] ?></td>
                                    <td>
                                        <?php 
                                        if ($row['status'] == 1) {
                                            echo "<span class='badge text-bg-warning'>Masuk ke Ruang Pemeriksaan</span>";
                                        } elseif ($row['status'] == 2) {
                                            echo "<span class='badge text-bg-primary'>Selesai Pemeriksaan</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1 "; ?>" data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_pemeriksaan'] ?>">Terima</button>
                                            <button class="<?php echo (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary btn-sm me-1 disabled text-nowrap" : "btn btn-success btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#selesai_pemeriksaanitem<?php echo $row['id_list_pemeriksaan'] ?>">Selesai Pemeriksaan</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
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
