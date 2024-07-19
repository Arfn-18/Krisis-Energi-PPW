<?php
include 'controller/connect.php';
$query = mysqli_query($con, "SELECT * FROM  PengambilanKeputusan");
while ($data = mysqli_fetch_array($query)) {
    $view[] = $data;
}


if (empty($view)) {
    echo "Tidak ada data";
} else {
?>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover table-sm align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" class="text-nowrap">Negara</th>
                    <th scope="col" class="text-nowrap">Sumber Energi</th>
                    <th scope="col" class="text-nowrap">Tahun</th>
                    <th scope="col">Severity</th>
                    <th scope="col" class="text-nowrap">Populasi</th>
                    <th scope="col" class="text-nowrap">GDP</th>
                    <th scope="col" class="text-nowrap">Keputusan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($view as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama_negara'] ?></td>
                        <td><?= $row['nama_sumber_energi'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td><?= $row['severity_level'] ?></td>
                        <td><?= number_format($row['populasi'], 0, ',', '.') ?></td>
                        <td><?= $row['GDP'] ?></td>
                        <td>
                            <?php if ($row['keputusan'] == "Krisis Ekstrem") {
                            ?>
                                <span class="badge bg-danger">Krisis Ekstrem</span>
                            <?php
                            } else if ($row['keputusan'] == "Krisis Berat") {
                            ?>
                                <span class="badge text-dark bg-danger">Krisis Berat</span>
                            <?php
                            } elseif ($row['keputusan'] == "Krisis Sedang") {
                            ?>
                                <span class="badge text-dark bg-warning">Krisis Sedang</span>
                            <?php
                            } elseif ($row['keputusan'] == "Krisis Ringan") {
                            ?>
                                <span class="badge text-dark bg-success">Krisis Ringan</span>
                            <?php
                            }
                            ?>
                            
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
}
    ?>
    </div>