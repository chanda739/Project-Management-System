<?php
	$user=$_GET['usnm'];
	$con=mysqli_connect("localhost","root","","project");
	$query="select * from login where USERNAME='$user'";
	$result=mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($result)==0)
	{	
		echo"USERNAME DOES NOT EXIST";
	}
	else
	{
		if($user=="$row[USERNAME]")
		{
			echo"USERNAME ALREADY EXISTS PLEASE ENTER DIFFERENT USERNAME";
			return;
		}
	}
	mysqli_close($con);
?>