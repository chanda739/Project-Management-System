<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:home.php');
	}	
	$tech=$_POST['tech'];
	$assign='UNASSIGNED';
	/*if($_POST['fname']=="" ||$_POST['lname']=="" || $_POST['cname']==""|| $_POST['bname']==""|| $_POST['sem']==""|| $_POST['email']==""|| $_POST['contact']==""|| $_POST['tech']==""|| $_POST['year']==""|| $_POST['dob']==""|| $_POST['assign']=="")
	{
		header('location:student.php');
	}*/
	include('connect.php');
	$query="insert into student(FIRST_NAME,LAST_NAME,COLLEGE,BRANCH,SEMESTER,EMAIL,CONTACT,TECHNOLOGY,YEAR,DOB,PROJECT) values('$_POST[fname]','$_POST[lname]','$_POST[cname]','$_POST[bname]','$_POST[sem]','$_POST[email]','$_POST[contact]','$tech','$_POST[year]','$_POST[dob]','$assign')";
	mysqli_query($con,$query);
	mysqli_close($con);
	$_SESSION['login']=true;
	header('location:success.php');
?>