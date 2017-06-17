<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:home.php');
	}	
?>
<html>
	<script>
		alert("Project Assigned successfully");
		window.location="home.php";
	</script>
</html>