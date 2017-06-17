<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
	$client_id=$_GET['id'];
	$project_name=$_GET['name'];
	$con=mysqli_connect("localhost","root","","project");
	$query="select PROJECT_NAME from addproject where CLIENT_ID='$client_id'";
	$result=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	if($row['PROJECT_NAME']!=$project_name)
	{	
		echo"You can select this client";
	}
	else
	{
		echo"PLEASE SELECT DIFFERENT PROJECT NAME OR CLIENT NAME";
	}
	mysqli_close($con);
?>