<?php

$con = mysqli_connect("localhost", "root", "", "krisisenergi");
if(!$con){
    echo "Koneksi Gagal";
}