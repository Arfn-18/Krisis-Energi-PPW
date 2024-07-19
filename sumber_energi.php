    <?php
    include 'controller/connect.php';
    $query = mysqli_query($con, "SELECT * FROM sumberenergi");
    while ($data = mysqli_fetch_array($query)) {
        $krisis[] = $data;
    }
    ?>

    <!-- Modal Add Dampak-->
    <div class="modal fade" id="addSumber" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sumber Energi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="controller/proses_input_sumber.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="nama_sumber_energi" class="form-control" id="floatingInput" placeholder="Your Name" required>
                            <label for="floatingInput">Nama Sumber Energi</label>
                            <div class="invalid-feedback">
                                Masukan Sektor Nama Sumber Energi.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="jenis_sumber_energi" aria-label="Default select example" required>
                                <option selected hidden value="">Pilih Jenis Sumber Energi</option>
                                <option value="Terbarukan">Terbarukan</option>
                                <option value="Tak-Terbarukan">Tak-Terbarukan</option>
                            </select>
                            <label for="floatingInput">Jenis Sumber Energi</label>
                            <div class="invalid-feedback">
                                Pilih Jenis Sumber Energi.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="input_sumber_validate" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add Dampak -->

    <?php
    if (empty($krisis)) {
        echo "Tidak ada data";
    } else {
        foreach ($krisis as $row) {
    ?>
            <!-- Modal Edit Dampak-->
            <div class="modal fade" id="EditSumber<?= $row['id_sumber_energi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sumber Energi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="controller/proses_edit_sumber.php" method="POST">
                                <input type="hidden" name="id_sumber_energi" value="<?= $row['id_sumber_energi']; ?>">
                                <div class="col-sm">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_sumber_energi" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $row['nama_sumber_energi']; ?>" required">
                                        <label for="floatingInput">Nama Sumber Energi</label>
                                        <div class="invalid-feedback">
                                            Masukan Nama Sumber Energi.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="jenis_sumber_energi" aria-label="Default select example" required>
                                        <option value="" hidden selected>Pilih Sumber Energi</option>
                                        <option value="Terbarukan" <?= $row['jenis_sumber_energi'] == 'Terbarukan' ? 'selected' : ''; ?>>Terbarukan</option>
                                        <option value="Tak-Terbarukan" <?= $row['jenis_sumber_energi'] == 'Tak Terbarukan' ? 'selected' : ''; ?>>Tak Terbarukan</option>
                                    </select>
                                    <label for="floatingInput">Jenis Sumber Energi</label>
                                    <div class="invalid-feedback">
                                        Pilih Sumber Energi.
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="input_sumber_validate" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit Dampak -->

            <!-- Modal Delete Dampak-->
            <div class="modal fade" id="DeleteSumber<?= $row['id_sumber_energi']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Sumber Energi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="controller/proses_delete_sumber.php" method="POST">
                                <input type="hidden" name="id_sumber_energi" value="<?= $row['id_sumber_energi']; ?>">
                                <input type="hidden" name="nama_sumber_energi" value="<?= $row['nama_sumber_energi']; ?>">
                                <div class="col-lg-12 mb-3">
                                    <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Sumber Energi <b><?= $row['nama_sumber_energi']; ?></b> ?</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="input_sumber_validate" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Delete Dampak -->
        <?php
        }

        ?>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-hover table-sm mt-2 align-middle">
                <thead class="align-middle">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="text-nowrap">Nama Sumber Energi</th>
                        <th scope="col" class="text-nowrap">Jenis Sumber Energi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($krisis as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $row['nama_sumber_energi'] ?></td>
                            <td><?= $row['jenis_sumber_energi'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditSumber<?php echo $row['id_sumber_energi']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteSumber<?php echo $row['id_sumber_energi']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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
            <a data-bs-toggle="modal" data-bs-target="#addSumber" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Dampak Krisis</a>
        </div>
    </div>