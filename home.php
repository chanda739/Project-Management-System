<?php
		session_start();
		if(!isset($_SESSION['login']))
		{
			header('location:index.php');
		}	
		?>
<html>
<head>
	<TITLE>HOME</TITLE>
	</head>
	<link href="layout.css" rel="stylesheet" type="text/css">
	<div class="header">
		<h1>PROJECT MANAGEMENT SYSTEM</h1>
	</div>
	<div class="container">
    <div class="home">
	<h1>HOME </h1>
	<body>
		<table align="center">
			<tr>
				<td><a href="client.php">ADD CLIENT</a></td>
			</tr>
			<tr>
				<td><a href="project.php">ADD PROJECT</a></td>
			</tr>
			<tr>
				<td><a href="student.php">ADD STUDENT</a></td>
			</tr>
			<tr>
				<td><a href="assign.php">ASSIGN PROJECT</a></td>
			</tr>
			<tr>
				<td><td class="button" align="center"><input type="button" value="logout" onclick="window.location.href='logout.php'"/></td>
			</tr>
		</table>
		</div>
		</div>
	</body>
</html>