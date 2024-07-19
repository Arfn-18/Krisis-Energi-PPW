<?php
include 'controller/connect.php';
$query = mysqli_query($con, "SELECT
    * FROM krisisenergi LEFT JOIN negara ON krisisenergi.id_negara = negara.id_negara
    LEFT JOIN sumberenergi ON krisisenergi.id_sumber_energi = sumberenergi.id_sumber_energi;
");
while ($data = mysqli_fetch_array($query)) {
    $krisis[] = $data;
}

$queryNegara = mysqli_query($con, "SELECT id_negara, nama_negara FROM negara");
$querySumber = mysqli_query($con, "SELECT id_sumber_energi, nama_sumber_energi FROM sumberenergi");
?>

<!-- Modal Add Krisis-->
<div class="modal fade" id="addKrisis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Krisis Energi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/proses_input_krisis.php" method="POST">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="id_negara" aria-label="Default select example" required>
                                    <option value="" hidden selected>Pilih Negara</option>
                                    <?php
                                    foreach ($queryNegara as $value) {
                                        echo '<option value="' . $value['id_negara'] . '">' . $value['nama_negara'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <label for="floatingInput">Negara</label>
                                <div class="invalid-feedback">
                                    Pilih Negara.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="id_sumber_energi" aria-label="Default select example" required>
                                    <option value="" hidden selected>Pilih Sumber Energi</option>
                                    <?php
                                    foreach ($querySumber as $value) {
                                        echo '<option value="' . $value['id_sumber_energi'] . '">' . $value['nama_sumber_energi'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <label for="floatingInput">Sumber Energi</label>
                                <div class="invalid-feedback">
                                    Pilih Sumber Energi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <input type="number" name="tahun" class="form-control" id="floatingInput" placeholder="Your Name" required>
                                <label for="floatingInput">Tahun</label>
                                <div class="invalid-feedback">
                                    Masukan Tahun.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="severity_level" aria-label="Default select example" required>
                                    <option value="" hidden selected>Pilih Severity Level</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <label for="floatingInput">Severity Level</label>
                                <div class="invalid-feedback">
                                    Pilih Severity Level.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_krisis_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Krisis -->

<?php
if (empty($krisis)) {
    echo "Tidak ada data";
} else {
    foreach ($krisis as $row) {
?>
        <!-- Modal Edit Krisis-->
        <div class="modal fade" id="EditKrisis<?= $row['id_krisis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Krisis Energi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_edit_krisis.php" method="POST">
                            <input type="hidden" name="id_krisis" value="<?= $row['id_krisis']; ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="id_negara" aria-label="Default select example" required>
                                            <option value="" hidden selected>Pilih Negara</option>
                                            <?php
                                            foreach ($queryNegara as $valueNegara) {
                                                if ($row['id_negara'] == $valueNegara['id_negara']) {
                                                    echo '<option value="' . $valueNegara['id_negara'] . '" selected>' . $valueNegara['nama_negara'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $valueNegara['id_negara'] . '">' . $valueNegara['nama_negara'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Negara</label>
                                        <div class="invalid-feedback">
                                            Pilih Negara.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="id_sumber_energi" aria-label="Default select example" required>
                                            <option value="" hidden selected>Pilih Sumber Energi</option>
                                            <?php
                                            foreach ($querySumber as $value) {
                                                if ($row['id_sumber_energi'] == $value['id_sumber_energi']) {
                                                    echo '<option value="' . $value['id_sumber_energi'] . '" selected>' . $value['nama_sumber_energi'] . '</option>';
                                                } else {
                                                    echo '<option value="' . $value['id_sumber_energi'] . '">' . $value['nama_sumber_energi'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Sumber Energi</label>
                                        <div class="invalid-feedback">
                                            Pilih Sumber Energi.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" placeholder="Your Name" name="tahun" value="<?= $row['tahun']; ?>">
                                        <label for="floatingInput">Tahun</label>
                                        <div class="invalid-feedback">
                                            Masukan Tahun.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="id_sumber_energi" aria-label="Default select example" required>
                                            <option value="" hidden selected>Pilih Sumber Energi</option>
                                            <?php
                                            if ($row['severity_level'] == 1) {
                                                echo '<option value="1" selected>1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '<option value="3">3</option>';
                                                echo '<option value="4">4</option>';
                                                echo '<option value="5">5</option>';
                                            } elseif ($row['severity_level'] == 2) {
                                                echo '<option value="1">1</option>';
                                                echo '<option value="2" selected>2</option>';
                                                echo '<option value="3">3</option>';
                                                echo '<option value="4">4</option>';
                                                echo '<option value="5">5</option>';
                                            } elseif ($row['severity_level'] == 3) {
                                                echo '<option value="1">1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '<option value="3" selected>3</option>';
                                                echo '<option value="4">4</option>';
                                                echo '<option value="5">5</option>';
                                            } elseif ($row['severity_level'] == 4) {
                                                echo '<option value="1">1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '<option value="3">3</option>';
                                                echo '<option value="4" selected>4</option>';
                                                echo '<option value="5">5</option>';
                                            } else if($row['severity_level'] == 5) {
                                                echo '<option value="1">1</option>';
                                                echo '<option value="2">2</option>';
                                                echo '<option value="3">3</option>';
                                                echo '<option value="4">4</option>';
                                                echo '<option value="5" selected>5</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Sumber Energi</label>
                                        <div class="invalid-feedback">
                                            Pilih Sumber Energi.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="input_krisis_validate" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Krisis -->

        <!-- Modal Delete Warga-->
        <div class="modal fade" id="DeleteKrisis<?= $row['id_krisis']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Krisis Energi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="controller/proses_delete_krisis.php" method="POST">
                            <input type="hidden" name="id_krisis" value="<?= $row['id_krisis']; ?>">
                            <input type="hidden" name="nama_negara" value="<?= $row['nama_negara']; ?>">
                            <div class="col-lg-12 mb-3">
                                <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Data Krisis Energi Negara <b><?= $row['nama_negara']; ?></b> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="input_krisis_validate" class="btn btn-danger">Delete</button>
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
                    <th scope="col" class="text-nowrap">Negara</th>
                    <th scope="col" class="text-nowrap">Sumber Energi</th>
                    <th scope="col" class="text-nowrap">Tahun</th>
                    <th scope="col" class="text-nowrap">Severity</th>
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
                        <td><?= $row['nama_negara'] ?></td>
                        <td><?= $row['nama_sumber_energi'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td><?= $row['severity_level'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a href"#" class="btn btn-primary btn-sm rounded" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditKrisis<?php echo $row['id_krisis']; ?>"><i class="bi bi-pencil-square text-warning"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeleteKrisis<?php echo $row['id_krisis']; ?>"><i class="bi bi-trash3 text-danger"></i> Delete</a></li>
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
        <a data-bs-toggle="modal" data-bs-target="#addKrisis" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Krisis Energi</a>
    </div>
</div>