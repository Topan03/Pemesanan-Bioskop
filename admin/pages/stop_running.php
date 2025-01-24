<?php
session_start();
include('../../config/koneksi.php');
extract($_GET);
mysqli_query($conn,"update jadwal set status='0' where j_id='$id'");
$_SESSION['success']="Show Deleted";
header('location:view_shows.php');?>