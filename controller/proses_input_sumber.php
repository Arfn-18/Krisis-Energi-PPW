<?php
include "connect.php";
$id_sumber_energi = (isset($_POST['id_sumber_energi'])) ? htmlentities($_POST['id_sumber_energi']) : "";
$nama_sumber_energi = (isset($_POST['nama_sumber_energi'])) ? htmlentities($_POST['nama_sumber_energi']) : "";
$jenis_sumber_energi = (isset($_POST['jenis_sumber_energi'])) ? htmlentities($_POST['jenis_sumber_energi']) : "";

if (!empty(isset($_POST['input_sumber_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM sumberenergi WHERE id_sumber_energi = '$id_sumber_energi' AND nama_sumber_energi = '$nama_sumber_energi' AND jenis_sumber_energi = '$jenis_sumber_energi'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../";
        alert("Data sumber Energi ' . $nama_sumber_energi . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO sumberenergi (id_sumber_energi, nama_sumber_energi, jenis_sumber_energi) VALUES ('$id_sumber_energi', '$nama_sumber_energi', '$jenis_sumber_energi')");
        if ($query) {
            $massage = '
        <script>
        window.location = "../";
        alert("Berhasil Menambahkan Data Sumber Energi ' . $nama_sumber_energi . '");
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
