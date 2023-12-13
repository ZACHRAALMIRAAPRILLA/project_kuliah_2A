<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_pemeriksaan.*,tb_pembayaran.*,nama, SUM(harga*jumlah) AS harganya FROM tb_pemeriksaan
    LEFT JOIN tb_user ON tb_user.id = tb_pemeriksaan.perawat
    LEFT JOIN tb_list_pemeriksaan ON tb_list_pemeriksaan.kode_pemeriksaan = tb_pemeriksaan.id_pemeriksaan
    LEFT JOIN tb_riwayat_pasien ON tb_riwayat_pasien.id = tb_list_pemeriksaan.pasien
    LEFT JOIN tb_pembayaran ON tb_pembayaran.id_pembayaran = tb_pemeriksaan.id_pemeriksaan

    GROUP BY id_pemeriksaan ORDER BY waktu_pemeriksaan DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

//$select_kat_pasien = mysqli_query($conn, "SELECT id_kat_pasien,kategori_menu FROM tb_kategori_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pemeriksaan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Pasien Pemeriksaan</button>
                </div>
            </div>
            <!-- Modal Tambah Pasien Pemeriksaan Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pemeriksaan.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto" name="kode_pemeriksaan" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                            <label for="uploadFoto">Kode Pemeriksaan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Kode Pemeriksaan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="ruangan" placeholder="Nomor Ruangan" name="ruangan" required>
                                            <label for="ruangan">Ruangan</label>
                                            <div class="invalid-feedback">
                                                Masukkan No Ruangan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pasien" placeholder="Nama Pasien" name="pasien" required>
                                            <label for="pasien">Nama Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pasien
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="input_order_validate" value="12345">Lakukan Pemeriksaan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah Pasien pemeriksaan Baru-->
        
        <?php
        if (empty($result)) {
            echo "Data Pasien Pemeriksaan Tidak Ada";
        } else {
            foreach ($result as $row) { 
                ?>

                <!-- Modal Edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_pemeriksaan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien Pemeriksaan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_pemeriksaan.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <input readonly type="number" class="form-control" id="uploadFoto" name="kode_pemeriksaan" value="<?php echo $row['id_pemeriksaan'] ?>">
                                                <label for="uploadFoto">Kode Pemeriksaan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Pemeriksaan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="ruangan" placeholder="Nomor Ruangan" name="ruangan" required value="<?php echo $row['ruangan'] ?>">
                                                <label for="ruangan">Ruangan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nomor Ruangan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pasien" placeholder="Nama Pasien" name="pasien" required value="<?php echo $row['pasien'] ?>">
                                                <label for="pasien">Nama Pasien</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pasien
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit-->

                <!-- Modal Delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_pemeriksaan.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_pemeriksaan'] ?>" name="kode_pemeriksaan">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus data pemeriksaan atas nama <b><?php echo $row['pelanggan'] ?></b> dengan kode pemeriksaan <b><?php echo $row['id_pemeriksaan'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_pemerisaan_validate" value="12345">Hapus</button>
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
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Pemeriksaan</th>
                            <th scope="col">Pasien</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Perawat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu pemeriksaan</th>
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
                <?php echo (!empty($row['id_pembayaran'])) ? "<span class='badge text-bg-success'>lunas</span>" : "" ; ?>
            </td>
            <td>
                <?php echo $row['waktu_pemeriksaan'] ?>
            </td>
            <td>
                <div class="d-flex">
                    <a class="btn btn-info btn-sm me-1" href="./?x=pemeriksaanitem&pemeriksaan=<?php echo $row['id_pemeriksaan'] . "&ruangan=" . $row['ruangan'] . "&pasien=" . $row['pasien'] ?>"><i class="bi bi-eye"></i></a>
                    <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_pemeriksaan'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            
                                            <button class="<?php echo (!empty($row['id_pemeriksaan'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_pemeriksaan'] ?>"><i class="bi bi-trash"></i></button>
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