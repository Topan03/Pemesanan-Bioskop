<?php
include('../../config/koneksi.php');
session_start();
$email = $_POST["email"];
$pass = $_POST["password"];
$qry=mysqli_query($conn,"select * from login where username='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==1)
	{
		$_SESSION['theatre']=$usr['user_id'];
		header('location:index.php');
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:../index.php");
	}
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:../index.php");
}
?>