<?php 
  $password=$_GET['pass'];
  $confirm_pwd=$_GET['pa'];
  if($password==$confirm_pwd)
	{
	echo"PASSWORD MATCHED";
	}
	else
	{
	echo"PASSWORD DOESN'T MATCHED";
	return;
	}
?>