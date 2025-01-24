<?php
session_start();
include('../../config/koneksi.php');
extract($_GET);
mysqli_query($conn,"update jadwal set r_status='$status' where j_id='$id'");
$_SESSION['success']="Running Status Updated";
header('location:view_shows.php');
?>