<?php
session_start();
include('../../config/koneksi.php');

$mid=$_GET['mid'];
mysqli_query($conn,"DELETE FROM film WHERE film_id='$mid'");
 $_SESSION['success']="Movie Deleted";
header("location:view_movie.php");
?>