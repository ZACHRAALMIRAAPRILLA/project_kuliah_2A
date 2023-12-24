<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harga FROM tb_list_pemeriksaan
    LEFT JOIN tb_pemeriksaan ON tb_pemeriksaan.id_pemeriksaan = tb_list_pemeriksaan.kode_pemeriksaan
    LEFT JOIN tb_riwayat_pasien ON tb_riwayat_pasien.id_pasien = tb_list_pemeriksaan.pasien
    LEFT JOIN tb_pembayaran ON tb_pembayaran.id_bayar = tb_pemeriksaan.id_pemeriksaan

    GROUP BY id_list_pemeriksaan
    HAVING tb_list_pemeriksaan.kode_pemeriksaan = $_GET[pemeriksaan]");

$kode = $_GET['pemeriksaan'];
$ruangan = $_GET['ruangan'];
$pasien = $_GET['pasien'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    // $kode = $record['id_pemeriksaan'];
    // $ruangan = $record['ruangan'];
    // $pasien = $record['pasien'];


}

$select_menu = mysqli_query($conn, "SELECT id_pasien FROM tb_riwayat_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Jadwal  Pemeriksaan 
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kode_pemeriksaan" value="<?php echo $kode; ?>">
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

            <!-- Modal Tambah Jadwal Baru-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien Pemeriksaan Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pemeriksaanitem.php" method="POST">
                                <input type="hidden" name="kode_pemeriksaan" value="<?php echo $kode ?>">
                                <input type="hidden" name="ruangan" value="<?php echo $ruangan ?>">
                                <input type="hidden" name="pasien" value="<?php echo $pasien ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="pasien" id="" required>
                                                <option selected hidden value="">Pilih Pasien</option>
                                                <?php
                                                foreach ($select_pasien as $value) {
                                                    echo "<option value=$value[id]>$value[nama_pasien]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="pasien">Kategori Pasien </label>
                                            <div class="invalid-feedback">
                                                Pilih 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Pasien" name="jumlah" required>
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
                                            <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan">
                                            <label for="floatingPassword">catatan</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="12345">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Item Baru-->
            <?php
            if (empty($result)) {
                echo "Data Pasien tidak ada";
            } else {
                foreach ($result as $row) { ?>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_pemeriksaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Pasien</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_pemeriksaanitem.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_pemeriksaan'] ?>">
                                        <input type="hidden" name="kode_pemeriksaan" value="<?php echo $kode ?>">
                                        <input type="hidden" name="ruangan" value="<?php echo $ruangan ?>">
                                        <input type="hidden" name="pasien" value="<?php echo $pasien ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="pasien" id="">
                                                        <option selected hidden value="">Pilih Pasien</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['pasien'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_pasien]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_pasien]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu" for="uploadFoto">Pasien </label>
                                                    <div class="invalid-feedback">
                                                        Pasien Pulang, Rujukan / Rawat Inap
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Pasien" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
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
                                                        <label for="floatingPassword">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_pemeriksaanitem_validate" value="12345">Simpan</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit-->

                    <!-- Modal Delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_pemeriksaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_pemeriksaanitem.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_pemeriksaan'] ?>" name="id">
                                        <input type="hidden" name="kode_pemeriksaan" value="<?php echo $kode ?>">
                                        <input type="hidden" name="ruangan" value="<?php echo $ruangan ?>">
                                        <input type="hidden" name="pasien" value="<?php echo $pasien ?>">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus data pasien <b><?php echo $row['nama_pasien'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_pemeriksaanitem_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete-->
                <?php
                }
                ?>

                <!-- Modal Bayar-->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                                                        <?php echo $row['status'] ?>
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
                                <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukan Pembayaran?</span>
                                <form class="needs-validation" novalidate action="proses/proses_pembayaran.php" method="POST">
                                    <input type="hidden" name="kode_pemeriksaan" value="<?php echo $kode ?>">
                                    <input type="hidden" name="ruangan" value="<?php echo $ruangan ?>">
                                    <input type="hidden" name="pasien" value="<?php echo $pasien ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                                <label for="floatingInput">Nominal Uang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nominal Uang
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Bayar-->

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
                                <th scope="col">Aksi</th>
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
                                            echo "<span class='badge text-bg-warning'>Masuk ke jadwal</span>";
                                        }elseif ($row['status']==2){
                                            echo "<span class='badge text-bg-primary'>Selesai Pemeriksaan</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                    </td>

                                    <td>

                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_pemeriksaan'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_pemeriksaan'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
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
            <div>
                <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i>Item</button>
                <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>
            </div>
        </div>
    </div>
</div>