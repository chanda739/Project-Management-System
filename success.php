<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:home.php');
	}	
?>
<html>
	<script>
	alert("Inserted successfully");
	window.location="home.php";
	</script>
</html>