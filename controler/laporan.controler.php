<?php 
include "service/database.php";

if (isset($_POST["lapor"])) {
    $isi = $_POST["content"];
    $date = $_POST["date"];
    if (!empty((int)$isi) || !empty((int)$date)) {
        $query ="INSERT INTO `laporan`(`tanggal`, `isi`) VALUES ('$date','$isi')";
        $result = mysqli_query($db, $query);
    }else{
        echo "<script>alert('Isi atau tanggal tidak boleh kosong');</script>";
    }
}

if (isset( $_POST["selesai"])) {
    $id = $_GET["done"];
    $query = "UPDATE laporan SET selesai = 1 where id = $id";
    $result = mysqli_query($db, $query);
}
if (isset( $_POST["hapus"])) {
    $id = $_GET["delete"];
    $query = "DELETE FROM `laporan` WHERE id = $id";
    $result = mysqli_query($db, $query);
}