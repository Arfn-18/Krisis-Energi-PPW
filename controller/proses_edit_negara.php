<?php
include "connect.php";
$id_negara = (isset($_POST['id_negara'])) ? htmlentities($_POST['id_negara']) : "";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";
$populasi = (isset($_POST['populasi'])) ? htmlentities($_POST['populasi']) : "";
$GDP = (isset($_POST['GDP'])) ? htmlentities($_POST['GDP']) : "";

if (!empty(isset($_POST['input_negara_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM negara WHERE nama_negara = '$nama_negara' AND id_negara = '$id-negara'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../";
        alert("Data Negara ' . $nama_negara . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "UPDATE negara SET nama_negara = '$nama_negara', populasi = '$populasi', GDP = '$GDP' WHERE id_negara = '$id_negara'");
        if ($query) {
            $massage = '
            <script>window.location = "../";
            alert("Data Negara ' . $nama_negara . ' Berhasil Diedit");
            </script>';
        } else {
            $massage = '
        <script>
        window.location = "../";
        alert("Data Negara' . $nama_negara . ' Gagal Diedit");
        </scrip>
        ';
        }
    }
}
echo $massage;
