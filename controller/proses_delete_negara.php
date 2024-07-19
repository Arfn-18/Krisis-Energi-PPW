<?php
include "connect.php";
$id_negara = (isset($_POST['id_negara'])) ? htmlentities($_POST['id_negara']) : "";
$nama_negara = (isset($_POST['nama_negara'])) ? htmlentities($_POST['nama_negara']) : "";

if (!empty(isset($_POST['input_negara_validate']))) {
    $query = mysqli_query($con, "DELETE FROM negara WHERE id_negara = '$id_negara'");
    if ($query) {
    $massage = '
    <script>
    window.location = "../";
    alert("Data Negara ' . $nama_negara . ' Berhasil Dihapus");
    </script>';
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