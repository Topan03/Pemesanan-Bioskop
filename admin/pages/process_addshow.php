<?php
    session_start();
    include('../../config/koneksi.php');
    extract($_POST);
    foreach($stime as $time)
    {
        mysqli_query($conn,"insert into  jadwal values(NULL,'$time','".$_SESSION['theatre']."','$movie','$sdate','1','0')");
    }
    $_SESSION['success']="Show Added";
    header('location:add_show.php');
    ?>
    