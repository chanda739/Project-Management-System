<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
	$tech=$_POST['tech'];
	$client=$_POST['client'];
	include('connect.php');
	$query="insert into addproject(PROJECT_NAME,CLIENT_ID,TECHNOLOGY) values('$_POST[pname]','$client','$tech')";
	mysqli_query($con,$query);
	mysqli_close($con);
	$_SESSION['login']=true;
	header('location:success.php');
?>		
		