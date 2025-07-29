<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_beasiswa";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo "Koneksi gagal: " . mysqli_connect_error();
    die();
} else {
    // echo "Koneksi berhasil!";
}