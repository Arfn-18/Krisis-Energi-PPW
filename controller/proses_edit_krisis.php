<?php
include "connect.php";
$id_krisis = (isset($_POST['id_krisis'])) ? htmlentities($_POST['id_krisis']) : "";
$id_negara = (isset($_POST['id_negara'])) ? htmlentities($_POST['id_negara']) : "";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";
$tahun = (isset($_POST['tahun'])) ? htmlentities($_POST['tahun']) : "";
$severity_level = (isset($_POST['severity_level'])) ? htmlentities($_POST['severity_level']) : "";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "UPDATE krisisenergi SET id_negara = '$id_negara', tahun = '$tahun', severity_level = '$severity_level', id_sumber_energi = '$id_sumber_energi' WHERE id_krisis = '$id_krisis'");
    if ($query) {
        $massage = '<script>window.location = "../"; alert("Data Krisis Energi negara ' . $nama_negara . ' Tahun ' . $tahun . ' Berhasil Diedit");</script>';
    } else {
        $massage = '
        <script>
        window.location = "KrisisEnergi";
        alert("Data ' . $penyebab . ' Gagal Diedit");
        </scrip>
        ';
    }
}
echo $massage;
