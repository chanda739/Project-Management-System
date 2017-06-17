<?php
	session_start();
	if($_POST['pswd']=="" || $_POST['uname']=="")
	{
		header('location:index.php');
	}
	else
	{
		$user=$_POST['uname'];
		$user=trim($user);
		$user=htmlspecialchars($user);
		$user=stripslashes($user);
		$query="select * from login where USERNAME='$user'";
		$con=mysqli_connect("localhost","root","","project");
		$result=mysqli_query($con,$query);
			if(!$result)
			{
				echo mysqli_error($con);
			}
		$row=mysqli_fetch_array($result);
		mysqli_close($con);
			if($_POST['pswd']==$row['PASSWORD'])
			{
				$_SESSION['login']=true;
				header("location:home.php");
			}
			else
			{
				header("location:index.php");
			}
	}
?>