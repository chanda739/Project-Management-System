<html>
<head>
		<TITLE>RESET PASSWORD</TITLE>
	</head>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<div class="header">
	<h1>RESET PASSWORD</h1>
	</div>
	<div class="container">
    <div class="login">
      <h1>CHANGE PASSWORD</h1>
	<body>  
	<form method="post" action="changepassword.php" id="change">
		<p>Current Password
		<input type="password" name="cur_pwd"  id="cur_pwd" placeholder="Current Password"/></p>
		<p>New password
		<input type="password" name="password"  id="password" placeholder="New Password"/></p>
		<p>Confirm password
		<input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password" /></p>
		<p align="center" class="button"><input type="button" name="button" value="Save Password" onclick="validateAndSubmit()"/></p>
		<p align="center" class="button1"><input type="button" value="Home" onclick="window.location.href='home.php'"/></p>
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
	var current=document.getElementById("cur_pwd").value;
	if(current.trim()=="")
	{
		alert("Current password not entered!!!!");
			return;
	}
	var password=document.getElementById("password").value;
	if(password.trim()=="")
	{
		alert("Enter new password entered!!!!");
			return;
	}
	var confirm_password=document.getElementById("confirm_pwd").value;
	if(confirm_password.trim()=="")
	{
		alert("Please confirm your new password !!!!");
			return;
	}
	document.getElementById("change").submit();
}
</script>
</html>