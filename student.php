<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
?>
<html>
<head>
		<TITLE>STUDENT PAGE</TITLE>
	</head>
<link rel="stylesheet" href="stylelay.css" type="text/css">
	<body>
	<div class="header">
		<h1 align="center">STUDENT INFORMATION<h1>
	</div>
		<div class="container">
		<div class="client">
		<form method="post" action="insertstudent.php" id="addstudent">
		<table align="center">
			<tr>
				<td><b>FIRST NAME</b></td>
				<td><p><input type="text" name="fname" id="fname" placeholder="First name"/></p></td>
			</tr>
			<tr>
				<td><b>LAST NAME</b></td>
				<td><p><input type="text" name="lname" id="lname"  placeholder="Last name"/></p></td>
			</tr>
			<tr>
				<td><b>COLLEGE</b></td>
				<td><p><input type="text" name="cname" id="cname"  placeholder="College"/></p></td>
			</tr>
			<tr>
				<td><b>BRANCH</b></td>
				<td><p><input type="text" name="bname" id="bname" placeholder="Branch"/></p></td>
			</tr>
			<tr>
				<td><b>SEMESTER</b></td>
				<td><p><input type="int" name="sem" id="sem" placeholder="Semester"/></p></td>
			</tr>
			<tr>
				<td><b>EMAIL</b></td>
				<td><p><input type="text" name="email" size=30 id="email" placeholder="E-Mail ID"/></p></td>
			</tr>
			<tr>
				<td><b>CONTACT</b></td>
				<td><p><input type="text" name="contact" size=10 maxlength=13 id="contact" placeholder="Contact"/></p></td>
			</tr>
			<tr>
				<td><b>TECHNOLOGY</b></td>
				<td><select name="tech" id="tech" type="option">
						<option value="" color='#FFD3AD'>Select Technology</option>
						<option value="PHP">PHP</option>
						<option value="JAVA">JAVA</option>
						<option value="JREE">JREE</option>
						<option value="ANDROID">ANDROID</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>YEAR</b></td>
				<td><p><input type="int" name="year" id="year" placeholder="Year"/></p></td>
			</tr>
			<tr>
				<td><b>DOB</b></td>
				<td><p><input type="text" name="dob" id="dob" placeholder="DOB"/></p></td>
			</tr>
			<tr>
				<td class="button" align="center"><input type="button" value="Insert Student" onclick="validateAndSubmit()"/></td>
				<td class="button1" align="center"><input type="button" value="Home" onclick="window.location.href='home.php'"/></td>
			</tr>
		</table>
		</form>
		</div>
		</div>
	</body>
 <script>
	function getXMLHttp()
	{
		var xmlhttp=false;
		if(window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();
		}
		else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		return xmlhttp;
	}
	function validateAndSubmit()
	{  
		var first_name=document.getElementById("fname").value;
		if(first_name.trim()=="")
		{
			alert("Student first name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z]*$/;
			if(!pat.test(first_name))
			{
				alert("Invalid first name !!!!");
				return;
			}
		}
		var last_name=document.getElementById("lname").value;
		if(last_name.trim()=="")
		{
			alert("Student last name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z]*$/;
			if(!pat.test(last_name))
			{
				alert("Invalid last name !!!!");
				return;
			}
		}
		var college_name=document.getElementById("cname").value;
		if(college_name.trim()=="")
		{
			alert("College name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z ]*$/;
			if(!pat.test( college_name))
			{
				alert("Invalid college name !!!!");
				return;
			}
		}
		var branch = document.getElementById("bname").value;
		if(branch.trim()=="")
		{
			alert("Branch has not been entered!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z ]*$/;
			if(!pat.test( branch))
			{
				alert("Invalid branch !!!!");
				return;
			}
		}
		var semester = document.getElementById("sem").value;
		if(semester.trim()=="")
		{
			alert("Semester has not been entered!!!");
				return;
		}
		else
		{
			var pat=/^[1-8]{1}$/;
			if(!pat.test( semester))
			{
				alert("Invalid semester !!!!");
				return;
			}
		}
		var email=document.getElementById("email").value;
		if(email.trim()=="")
		{
			alert("Please enter your email!!!");
			return;
		}
		else
		{
			var pat=/^[A-Za-z0-9@.]*$/;
			if(!pat.test( email))
			{
				alert("Invalid email !!!!");
				return;
			}
		}
		var contact=document.getElementById("contact").value;
		if(contact.trim()=="")
		{
			alert("Please enter the contact number!!!");
			return;
		}
		else
		{
			var pat=/^[0-9]{10,13}$/;
			if(!pat.test(contact))
			{
				alert("Invalid contact number !!!!");
				return;
			}
		}
		var technology=document.getElementById("tech").value;
		if(technology.trim()=="")
		{
			alert("Please select technology!!!");
			return;
		}
		else
		{
			var pat=/^[A-Za-z ]*$/;
			if(!pat.test(technology))
			{
				alert("Invalid technology !!!!");
				return;
			}
		}
		var year=document.getElementById("year").value;
		if(year=="")
		{
			alert("Please enter year!!!");
			return;
		}
		else
		{
			var pat=/^[0-9 ]{4}$/;
			if(!pat.test(year))
			{
				alert("Invalid year !!!!");
				return;
			}
		}
		var dob=document.getElementById("dob").value;
		if(dob.trim()=="")
		{
			alert("Please enter dob!!!");
			return;
		}
		document.getElementById("addstudent").submit();
	}
</script>
</html>