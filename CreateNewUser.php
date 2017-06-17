<html>
	<head>
		<TITLE>NEW USER</TITLE>
	</head>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<div class="header">
	<h1>REGISTER HERE</h1>
	</div>
<div class="container">
    <div class="login">
      <h1>SIGN UP</h1>
	<body>
		<form method ="post" action="signup.php" id="index">
		<p>USERNAME
		<input type="text" name="uname" id="uname"  placeholder="Username" onblur="ValidateUsername(this.value)"/></p>
		<p>PASSWORD<input type="password" name="pswd" id="pswd" placeholder="Password"/></p>
		<p>CONFIRM PASSWORD
		<input type="password" name="pwd" id="pwd" placeholder="Confirm Password" onblur="ValidateConfirm(this.value)" /></p>
		<p class="button" align="center"><input type="button" name="button" value="CREATE" onclick="validateAndSubmit()"/></p>
		</form>
		</div>
		</div>
	</body>
<script>
 var flag=0;
 var flag1=0;
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
	function ValidateUsername(user)
	{
	flag1=0;
		if(user.trim()=="")
		{
			document.getElementById("usernm").innerHTML="Invalid Username.";
			return;
		}
		var url="usernamepresent.php?usnm="+user;
		var req=getXMLHttp();
		if(req)
		{
			req.onreadystatechange=function()
			{
				if(req.readyState==4)
				{
					if(req.status==200)
					{
						if(req.responseText=="USERNAME ALREADY EXISTS PLEASE ENTER DIFFERENT USERNAME")
						{
							flag1=1;
						}
						else
						{
							flag1=0;
						}
						document.getElementById("usernm").innerHTML=req.responseText;
					}
				}
			}
			req.open("GET",url,true);
			req.send();
		}
	}
	function ValidateConfirm(pass)
	{
	flag=0;
		if(pass.trim()=="")
		{
			document.getElementById("password").innerHTML="Confirm Password not entered";
			return;
		}
		var password=document.getElementById("pswd").value;
		var url="confirmpass.php?pass="+pass+"&pa="+password;
		var req=getXMLHttp();
		if(req)
		{
			req.onreadystatechange=function()
			{
				if(req.readyState==4)
				{
					if(req.status==200)
					{
					if(req.responseText=="PASSWORD MATCHED")
						{
							flag=1;
						}
						else
						{
							flag=0;
						}
						document.getElementById("password").innerHTML=req.responseText;
					}
				}
			}
			req.open("GET",url,true);
			req.send();
		}
	}
	function validateAndSubmit()
	{  
		var username=document.getElementById("uname").value;
		if(username.trim()=="")
		{
			alert("Enter username!!!!");
				return;
		}
		var pat=/^([A-Za-z_]{1})([A-Za-z0-9_])*$/;
		if(!pat.test(username))
		{
			alert("Invalid username !!!!");
			return;
		}
		var password=document.getElementById("pswd").value;
		if(password.trim()=="")
		{
			alert("Enter password!!!!");
				return;
		}
		var confirm=document.getElementById("pwd").value;
		if(confirm.trim()=="")
		{
			alert("Enter confirm password!!!!");
				return;
		}
		if(flag1==1)
		{
			alert("USERNAME ALREADY EXISTS");
			return;
		}
		else
		{
			if(flag==1)
			{
			document.getElementById("index").submit();
			}
			else
			{
			alert("PASSWORD DOESN'T MATCH");
			return;
			}
		}
	}
</script>
</html>