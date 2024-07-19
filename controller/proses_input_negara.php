<?php
include "connect.php";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";
$populasi = (isset($_POST['populasi'])) ? htmlentities($_POST['populasi']) : "";
$GDP = (isset($_POST['GDP'])) ? htmlentities($_POST['GDP']) : "";

if (!empty(isset($_POST['input_negara_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM negara WHERE nama_negara = '$nama_negara'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../";
        alert("Negara '. $nama_negara .' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO negara (nama_negara, populasi, GDP) VALUES ('$nama_negara', '$populasi', '$GDP')");
        if ($query) {
            $massage = '
        <script>
        window.location = searchParams.get("page");
        alert("Berhasil Menambahkan Negara '. $nama_negara .'");
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
?>
<script src="../script.js"></script>