<?php
$host = 'localhost';
$user = 'root'; // Ganti dengan username MySQL
$password = ''; // Ganti dengan password MySQL
$dbname = 'bioskop1'; // Ganti dengan nama database

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
