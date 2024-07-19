<?php
include "connect.php";
$id_krisis = (isset($_POST['id_krisis'])) ? htmlentities($_POST['id_krisis']) : "";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";   

if (!empty(isset($_POST['input_krisis_validate']))) {
    $query = mysqli_query($con, "DELETE FROM krisisenergi WHERE id_krisis = '$id_krisis'");
    if ($query) {
    $massage = '<script>window.location = "../"; alert("Data Krisis Energi Negara ' . $nama_negara . ' Berhasil Dihapus");</script>';
    } else {
        $massage = '
        <script>
        window.location = "../";
        alert("Data Gagal Dihapus");
        </scrip>
        ';
    }
}
echo $massage;
?>