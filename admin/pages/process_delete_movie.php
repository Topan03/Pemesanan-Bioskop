<?php
session_start();
include('../../config/koneksi.php');

$mid=$_GET['mid'];
mysqli_query($conn,"delete  from film where film_id='$mid'");
 $_SESSION['success']="Movie deleted  successfully";
header("location:index.php");
?>