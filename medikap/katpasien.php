<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori_pasien");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Pasien
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Nama Pasien</button>
                </div>
            </div>
            <!-- Modal Tambah Kategori Pasien Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Nama Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_katpasien.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="data diri" id="">
                                                <option value="1">Nama</option>
                                                <option value="2">Umur</option>
                                            </select>
                                            <label for="floatingInput">Data Diri</label>
                                            <div class="invalid-feedback">
                                                Masukkan Data Diri
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keluhan" name="katpasien" required>
                                            <label for="floatingInput">Keluhan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Keluhan
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save changes</button>
                                    </div>
                                </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Nama Pasien Baru-->
            <?php
            foreach ($result as $row) { ?>
            

                <!-- Modal Edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_kat_pasien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Keluhan </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_katpasien.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_kat_pasien'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" required name="nama" id="">
                                                        <?php
                                                        $data = array("Pulang","Rujukan", "Rawat Inap");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['jenis_pasien'] == $key + 1) {
                                                                echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option value=" . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pasien
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keluhan" name="katpasien" required value="<?php echo $row ['keluhan']?>">
                                            <label for="floatingInput">Keluhan</label>
                                            <div class="invalid-feedback">
                                                Masukkan Keluhan
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_katmenu_validate" value="12345">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Edit-->

                <!-- Modal Delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_pasien'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Pasien</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_katpasien.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_kat_pasien'] ?>" name="id">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus data pasien <b><?php echo $row['kategori_pasien'] ?></b>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Delete-->

            <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {

            ?>
            <!-- Tabel Daftar Kategori Menu -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pasien</th>
                                <th scope="col">Kategori Pasien</th>
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
                                    <td><?php echo ($row['jenis_pasien']==1) ? "Pulang" : "Rujukan" , "Rawat Inap"?></td>
                                    <td><?php echo $row['kategori_pasien'] ?></td>

                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_kat_pasien'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_kat_pasien'] ?>"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Akhir Tabel Daftar Kategori Pasien -->
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