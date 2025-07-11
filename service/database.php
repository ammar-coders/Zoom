<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "zoom";

// Koneksi ke database
$db = mysqli_connect($hostname, $username, $password, $database);

// Cek koneksi
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}