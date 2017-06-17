<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:home.php');
	}	
	/*if($_POST['Fname']=="" ||$_POST['Lname']=="" || $_POST['address']==""|| $_POST['contact']==""|| $_POST['email']=="")
	{
		header('location:client.php');
	}*/
	include('connect.php');
	$query="insert into client(FIRST_NAME,LAST_NAME,ADDRESS,CONTACT,EMAIL) values('$_POST[Fname]','$_POST[Lname]','$_POST[address]','$_POST[contact]','$_POST[email]')";
	mysqli_query($con,$query);
	mysqli_close($con);
	$_SESSION['login']=true;
	header('location:success.php');
?>


