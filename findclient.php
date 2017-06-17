<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:home.php');
	}	
	$client_name=$_GET['id'];
	if($client_name=="")
	{
		header('location:client.php');
	}
	$con=mysqli_connect("localhost","root","","project");
	$query="select * from client where FIRST_NAME='$client_name'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==0)
	{	
	echo"Client Name Available";
	}
	else
	{
		echo"CLIENT ALREADY EXIST";
	}
	mysqli_close($con);
?>
