<?php
session_start();
include('config/koneksi.php');
mysqli_query($conn,"delete from tiket where tiket_id='".$_GET['id']."'");
$_SESSION['success']="Booking Cancelled Successfully";
header('location:profile.php');
?>