<?php
    include('../../config/koneksi.php');
    extract($_POST);
    mysqli_query($conn,"insert into jam_tayang values(NULL,'$screen','$sname','$time')");
?>