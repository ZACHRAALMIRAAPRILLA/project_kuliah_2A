<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_pasien
    LEFT JOIN tb_kategori_pasien On tb_kategori_pasien.id_kat_pasien = tb_daftar_pasien.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_pasien,kategori_pasien FROM tb_kategori_pasien");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pasien
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah Pasien</button>
                </div>
            </div>
            <!-- Modal Tambah Pasien Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keluhan dan Pasien Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pasien.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Pasien" name="nama_pasien" required>
                                            <label for="floatingInput">Nama Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pasien
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_pasien" required>
                                                <option selected hidden value="">Pilih Kategori Pasien</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    echo "<option value=" . $value['id_kat_pasien'] . ">$value[kategori_pasien]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Pulang, Rujukan atau Rawat Inap</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Pulang, Rujukan atau Rawat Inap
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3" name="nohp">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Hasil" name="hasil" required>
                                            <label for="floatingInput">Hasil</label>
                                            <div class="invalid-feedback">
                                                Masukkan Hasil
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Pasien Baru-->
            <?php
            if (empty($result)) {
                echo "Data Kategori Pasien tidak ada";
            } else {
            foreach ($result as $row) { ?>
            
            <!-- Modal View-->
                            
            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pasien.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput"  value="<?php echo $row['nama_pasien'] ?>">
                                            <label for="floatingInput">Nama Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pasien
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput"  value="<?php echo $row['keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example">
                                                <option selected hidden value="">Pilih Kategori Pasien</option>
                                                <?php
                                                foreach ($select_kat_pasien as $value) {
                                                    if($row['kategori'] == $value['id_kat_pasien']){
                                                        echo "<option selected value=" . $value['id_kat_pasien'] . ">$value[kategori_pasien]</option>";
                                                    }else{
                                                        echo "<option value=" . $value['id_kat_pasien'] . ">$value[kategori_pasien]</option>";
                                                    }
                                                    
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori </label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Pulang, Rujukan atau Rawat Inap
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3" name="nohp">
                                            <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['hasil'] ?>">
                                            <label for="floatingInput">Hasil</label>
                                            <div class="invalid-feedback">
                                                Masukkan Hasil
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
                <!-- End Modal View-->

                <!-- Modal Edit-->
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Pasien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_pasien.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto </label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Pasien" name="nama_Pasien" required value="<?php echo $row['nama_pasien'] ?>">
                                            <label for="floatingInput">Nama Pasien</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Pasien
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="kat_pasien">
                                                <option selected hidden value="">Pilih Kategori Pasien</option>
                                                <?php
                                                foreach ($select_kat_pasien as $value) {
                                                    if($row['kategori'] == $value['id_kat_pasien']){
                                                        echo "<option selected value=" . $value['id_kat_pasien'] . ">$value[kategori_pasien]</option>";
                                                    }else{
                                                        echo "<option value=" . $value['id_kat_pasien'] . ">$value[kategori_pasien]</option>";
                                                    }
                                                    
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Pulang, Rujukan atau Rawat Inap</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Pulang, Rujukan atau Rawat Inap
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3" name="nohp">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="hasil" name="hasil" required value="<?php echo $row['hasil'] ?>">
                                            <label for="floatingInput">Hasil</label>
                                            <div class="invalid-feedback">
                                                Masukkan Hasil
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
                <!-- End Modal Edit-->

                <!-- Modal Delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                    <div class="col-lg-12">
                                                Apakah anda ingin menghapus data pasien? <b><?php echo $row ['nama_pasien'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Hapus</button>
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
                                <th scope="col">Foto </th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jenis Pasien</th>
                                <th scope="col">Hasil</th>
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
                                        <div style="width: 80px;"> <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                    </td>
                </div>
                </td>
                <td><?php echo $row['nama_pasien'] ?></td>
                <td><?php echo $row['keterangan'] ?></td>
                <td><?php echo ($row['jenis_pasien'] == 1) ? "Pulang" : "Rujukan" , "Rawat Inap" ?></td> 
                <td><?php echo $row['kategori_menu'] ?></td>
                <td><?php echo $row['harga'] ?></td>
                <td><?php echo $row['stok'] ?></td>

                <td>
                    <div class="d-flex">
                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
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