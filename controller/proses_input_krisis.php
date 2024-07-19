<?php
include "connect.php";
$id_krisis = (isset($_POST['id_krisis'])) ? htmlentities($_POST['id_krisis']) : "";
$id_negara = (isset($_POST['id_negara'])) ? htmlentities($_POST['id_negara']) : "";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";
$tahun = (isset($_POST['tahun'])) ? htmlentities($_POST['tahun']) : "";
$severity_level = (isset($_POST['severity_level'])) ? htmlentities($_POST['severity_level']) : "";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM krisisenergi WHERE id_krisis = '$id_krisis' AND id_negara = '$id_negara' AND tahun = '$tahun'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../";
        alert("Krisis Energi Negara '. $nama_negara .' Tahun '. $tahun .' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO krisisenergi (id_krisis, id_negara, tahun, severity_level, id_sumber_energi) VALUES ('$id_krisis', '$id_negara', '$tahun', '$severity_level', '$id_sumber_energi')");
        if ($query) {
            $massage = '
        <script>
        window.location = "../";
        alert("Berhasil Menambahkan krisis energi negara '. $nama_negara .' Tahun '. $tahun .'");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "../";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $massage;