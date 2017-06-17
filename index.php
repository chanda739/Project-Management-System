<html>
	<head>
		<TITLE>HOME</TITLE>
	</head>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<body>
	<div class="header">
	<h1>PROJECT MANAGEMENT SYSTEM</h1>
	</div>
<div class="container">
    <div class="login">
		<h1>LOGIN PANEL</h1>
		<form method ="post" action="chklogin.php" id="index">
		<p>USERNAME
		<input type="text" name="uname" id="uname" placeholder="Username"/></p>
		<p>PASSWORD
		<input type="password" name="pswd" id="pswd" placeholder="Password"/></p>
		<p class="button"><input type="button" value="LOGIN" onclick="validateAndSubmit()"></p>
		<div class="login-help">
      <p>Want to change your password? <a href="change_password.php">Click here to reset it</a>.</p>
    </div>
		<p class="button"><input type="button" value="REGISTER NOW" onclick="CreateNewUser()"/></p>
		</form>
		</div>
		</div>
	</body>
	<script>
	function validateAndSubmit()
	{
		var uname=document.getElementById("uname").value;
		if(uname.trim()=="")
		{
			alert("Enter username ");
			return;
		}

		var pat=/^([A-Za-z_]{1})([A-Za-z0-9_])*$/;
		if(!pat.test(uname))
		{
			alert("Invalid username !!!!");
			return;
		}
		
		var pwd=document.getElementById("pswd").value;
		if(pwd.trim()=="")
		{
			alert("Enter password ");
			return;
		}
		document.getElementById("index").submit();
	}
	function CreateNewUser()
	{
		window.location="CreateNewUser.php";
	}
	</script>
	  </div>
  </div>
</html>
