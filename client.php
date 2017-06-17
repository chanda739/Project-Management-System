<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
?>
<html>
	<head>
		<TITLE>CLIENT PAGE</TITLE>
	</head>
	<link rel="stylesheet" href="stylelay.css" type="text/css">
	<body>
		<div class="header">
			<h1>CLIENT INFORMATION</h1>
		</div>
		<div class="container">
		<div class="client">
		<form method="post" action="insertclient.php" id="addclient">
		<table align="center">
			<tr>
				<td><b>	FIRST NAME</b></td>
				<td><p><input type="text" name="Fname" id="Fname" placeholder="First name" onblur="ValidateClient(this.value)"/></td></p>
			</tr>
			<tr>
				<td><b>	LAST NAME</b></td>
				<td><p><input type="text" name="Lname" id="Lname" placeholder="Last name"/></td></p>
			</tr>
			<tr>
				<p><td id="clientname" align="center" colspan="2"></td></p>
			</tr>
			<tr>
				<td><b>ADDRESS</b></td>
				<td><p><input type="text" name="address" id="address" placeholder="Address"/></td></p>
			</tr>
			<tr>
				<td><b>CONTACT</b></td>
				<td><p><input type="text" size=10 maxlength=13 name="contact" id="contact"  placeholder="Contact"/></td></p>
			</tr>
			<tr>
				<td><b>E-MailID</b></td>
				<td><p><input type="text" size=30 name="email" id="email" placeholder="E-MailID"/></td></p>
			</tr>
			<tr>
				<td class="button"><input type="button" value="Create Contact" onclick="validateAndSubmit()"/></td>
				<td class="button1"><input type="button" value="Home" onclick="window.location.href='home.php'"/></td>
			</tr>
		</table>
		</form>
		</div>
		</div>
	 </body>
	 <script>
	 var flag=0;
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
	function ValidateClient(name)
	{
		flag=0;
		if(name.trim()=="")
		{
			document.getElementById("clientname").innerHTML="Invalid Client name.";
			return;
		}
		var url="findclient.php?id="+name;
		var req=getXMLHttp();
		if(req)
		{
			req.onreadystatechange=function()
			{
				if(req.readyState==4)
				{
					if(req.status==200)
					{
						if(req.responseText=="Client Name Available")
						{
							flag=1;
						}
						else
						{
							flag=0;
						}
						document.getElementById("clientname").innerHTML=req.responseText;
					}
				}
			}
			req.open("GET",url,true);
			req.send();
		}
				
	}
	function validateAndSubmit()
	{  
		var First_name=document.getElementById("Fname").value;
		if(First_name.trim()=="")
		{
			alert("First name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z]*$/;
			if(!pat.test(First_name))
			{
				alert("Invalid First Name !!!!");
				return;
			}
		}
		var Last_name=document.getElementById("Lname").value;
		if(Last_name.trim()=="")
		{
			alert("Last name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z]*$/;
			if(!pat.test(Last_name))
			{
				alert("Invalid Last Name !!!!");
				return;
			}
		}
		var address = document.getElementById("address").value;
		if(address.trim()=="")
		{
			alert("Address has not been entered!!!");
				return;
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
  		var email=document.getElementById("email").value;
		if(email.trim()=="")
		{
			alert("Please enter your email!!!");
			return;
		}
		else
		{
			var pat=/^[A-Za-z0-9@.]*$/;
			if(!pat.test(email))
			{
				alert("Invalid email !!!!");
				return;
			}
		}
		if(flag==0)
		{
			alert("Invalid client name");
			return;
		}
		else
		{
		document.getElementById("addclient").submit();
		}
	}
</script>
</html>