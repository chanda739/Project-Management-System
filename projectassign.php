<?php
	session_start();
	if(!isset($_SESSION['login']))
		{
			header('location:home.php');
		}	
	if($_POST['project']=="")
	{
		header('location:index.php');
	}
		for($i=1;$i<=$_POST['number'];$i++)
		{
			$studname="student".$i;
			$studid=$_POST[$studname];
			include('connect.php');
			$query="insert into projectassign(PROJECT_ID,STUDENT_ID) values('$_POST[project]','$studid')";
			mysqli_query($con,$query);
			$query1="update student set PROJECT ='ASSIGNED' where ID=$studid";
			mysqli_query($con,$query1);
			mysqli_close($con);
		}
	$_SESSION['login']=true;
	header('location:successassign.php');
?>

