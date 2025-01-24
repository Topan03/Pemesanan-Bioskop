<?php
    include('../../config/koneksi.php');
    extract($_POST);
    mysqli_query($conn,"insert into screens values(NULL,'$theatre','$name','$seats','$charge')");
?>