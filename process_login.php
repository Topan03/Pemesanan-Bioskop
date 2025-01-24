<?php
include 'config/koneksi.php';
session_start();
$email = $_POST["email"];
$pass = $_POST["password"];
$qry=mysqli_query($conn,"select * from login where username='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==2)
	{
		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			header('location:index.php');
		}
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}
?>