<?php
    session_start();
    include('config/koneksi.php');
    extract($_POST);
    mysqli_query($conn,"insert into  registrasi values(NULL,'$nama','$email','$umur','$jenisKelamin')");
    $id=mysqli_insert_id($conn);
    mysqli_query($conn,"insert into  login values(NULL,'$id','$email','$password','2')");
    $_SESSION['user']=$id;
    header('location:index.php');
?>