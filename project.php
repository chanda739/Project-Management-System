<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
?>
<html>
<head>
		<TITLE>PROJECT PAGE</TITLE>
	</head>
<link rel="stylesheet" href="stylelay.css" type="text/css">
	<body>
	<div class="header">
		<h1 align="center"> PROJECT INFORMATION</h1>
		</div>
		<div class="container">
		<div class="client">
		<form method="post" action="insertproject.php" id="addproject">
		<table align="center">
			<tr>
				<td><b>PROJECT NAME</b></td>
				<td><p><input type="text" name="pname" id="pname" placeholder="Project Name" onblur="ValidateProjectName(this.value)"/></p></td>
			</tr>
			<tr>
				<td><b>CLIENT NAME</b></td>
				<td><?php
						 include('connect.php');
						$query="select ID,FIRST_NAME from client";
						 $result = mysqli_query ($con,$query);
					?>
					<select name='client' id='client' type="option" onchange='ValidateClientIdNProject(this.value)'>
					<option value=''>Select Client</option>
					<?php
						 while($row = mysqli_fetch_array($result))
						 {
					 ?>
					<option value='<?php echo $row['ID'];?>'><?php echo $row['FIRST_NAME'];?></option>";
					<?php
						 }
						  mysqli_close($con);
					?>
					 </select>
				</td>
			</tr>
			<tr>
			<td colspan="2" align="center"><div id="SameClientIdNProjectName"><p></p></div></td>
			</tr>
			<tr>
				<td><b>TECHNOLOGY</b></td>
				<td>  <select name="tech" id="tech" type="option">
						<option value=""><p>Select Technology</p></option>
						<option value="PHP">PHP</option>
						<option value="JAVA">JAVA</option>
						<option value="JREE">JREE</option>
						<option value="ANDROID">ANDROID</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="button" align="center"><input type="button" value="Add Project" onclick="validateAndSubmit()"/></td>
				<td class="button1"align="center"><input type="button" value="Home" onclick="window.location.href='home.php'"/></td>
			</tr>
		</table>
		</form>
		</div>
		</div>
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
	function ValidateProjectName(pname)
	{
		flag1=0;
		var clientid=document.getElementById("client").value;
		if(pname=="")
		{
		return;
		}
		else if(clientid=="")
		{
		return;
		}
		else
		{
		var clientid=document.getElementById("client").value;
		var url="MatchIdNname.php?id="+clientid+"&name="+pname;
		var req=getXMLHttp();
			if(req)
			{
			req.onreadystatechange=function()
			{
				if(req.readyState==4)
				{
					if(req.status==200)
					{
						if(req.responseText=="You can select this client")
						{
							flag1=1;
						}
						else
						{
							flag1=0;
						}
						document.getElementById("SameClientIdNProjectName").innerHTML=req.responseText;
					}
				}
			}
			req.open("GET",url,true);
			req.send();
			}
		}
	}
	function ValidateClientIdNProject(clientid)
	{
		flag=0;
		var project_name=document.getElementById("pname").value;
		if(project_name=="")
		{
		return;
		}
		else if(clientid=="")
		{
		return;
		}
		else
		{
			var url="MatchIdNname.php?id="+clientid+"&name="+project_name;
			var req=getXMLHttp();
			if(req)
			{
			req.onreadystatechange=function()
			{
				if(req.readyState==4)
				{
					if(req.status==200)
					{
						if(req.responseText=="You can select this client")
						{
							flag=1;
						}
						else
						{
							flag=0;
						}
						document.getElementById("SameClientIdNProjectName").innerHTML=req.responseText;
					}
				}
			}
			req.open("GET",url,true);
			req.send();
			}
		}
	}
	function validateAndSubmit()
	{  
		var project_name=document.getElementById("pname").value;
		if(project_name.trim()=="")
		{
			alert("Project name not entered!!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z ]*$/;
			if(!pat.test(project_name))
			{
				alert("Invalid project name !!!!");
				return;
			}
		}
		var client = document.getElementById("client").value;
		if(client.trim()=="")
		{
			alert("Client name has not been entered!!!");
				return;
		}
		else
		{
			var pat=/^[A-Za-z ]*$/;
			if(!pat.test(client))
			{
				alert("Invalid client name !!!!");
				return;
			}
		}
		var technology=document.getElementById("tech").value;
		if(technology.trim()=="")
		{
			alert("Please select technology!!!");
			return;
		}
		if(flag==1||flag1==1)
		{
			document.getElementById("addproject").submit();
		}
		else
		{
			alert("Please select different client name");
			return;
		}
		
	}
</script>
 	</body>
</html>