<?php
include '<controller/connect.php';
$query = mysqli_query($con, "SELECT * FROM negara");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}
?>

<!-- Modal Add Sumber-->
<div class="modal fade" id="addNegara" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Negara</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/proses_input_negara.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_negara" class="form-control" id="floatingInput" placeholder="Your Name" required>
                        <label for="floatingInput">Nama Negara</label>
                        <div class="invalid-feedback">
                            Masukan Nama Negara.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Your Name" name="populasi" required>
                                <label for="floatingInput">Jumlah Populasi</label>
                                <div class="invalid-feedback">
                                    Masukan Populasi.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Your Name" name="GDP" required>
                                <label for="floatingInput">GDP</label>
                                <div class="invalid-feedback">
                                    Masukan GDP.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_negara_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Sumber -->

<?php
if (empty($krisis)) {
    echo "Tidak ada data";
} else {
    foreach ($krisis as $row) {
?>

        <!-- Modal Edit Sumber-->
        <div class="modal fade" id="EditNegara<?= $row['id_negara']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Negara</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_edit_negara.php" method="POST">
                            <input type="hidden" name="id_negara" value="<?= $row['id_negara']; ?>">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_negara" class="form-control" id="floatingInput" value="<?= $row['nama_negara']; ?>">
                                <label for="floatingInput">Nama Negara</label>
                                <div class="invalid-feedback">
                                    Masukan Nama Negara.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" value="<?= $row['populasi']; ?>" name="populasi">
                                        <label for="floatingInput">Jumlah Populasi</label>
                                        <div class="invalid-feedback">
                                            Masukan Jumlah Populasi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="col-sm">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="<?= $row['GDP']; ?>" name="GDP">
                                            <label for="floatingInput">GDP</label>
                                            <div class="invalid-feedback">
                                                Masukan GDP.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="input_negara_validate" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit sumber -->

        <!-- Modal Delete Warga-->
        <div class="modal fade" id="DeleteNegara<?= $row['id_negara']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Negara</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_delete_negara.php" method="POST">
                            <input type="hidden" name="id_negara" value="<?= $row['id_negara']; ?>">
                            <input type="hidden" name="nama_negara" value="<?= $row['nama_negara']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Negara <b><?= $row['nama_negara']; ?></b> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="input_negara_validate" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Delete Warga -->

    <?php
    }
    ?>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover table-sm mt-2 align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" class="text-nowrap">Nama Negara</th>
                    <th scope="col" class="text-nowrap">Jumlah Populasi</th>
                    <th scope="col">GDP</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($krisis as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama_negara'] ?></td>
                        <td><?= number_format($row['populasi'], 0, ',', '.') ?></td>
                        <td><?= number_format($row['GDP'], 0, ',', '.') ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditNegara<?php echo $row['id_negara']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteNegara<?php echo $row['id_negara']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
                                </ul>
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

<div class="row mt-2">
    <div class="col-lg-12 col-md-12">
        <a data-bs-toggle="modal" data-bs-target="#addNegara" class="btn btn-primary btn-sm me-1"><i class="bi bi-plus-circle"></i> Negara</a>
    </div>
</div>
