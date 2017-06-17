<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
?>
<html>
<head>
		<TITLE>ASSIGNMENT PAGE</TITLE>
	</head>
<link rel="stylesheet" href="stylelay.css" type="text/css">
	<body>
	<div class="header">
		<h1 align="center">ASSIGN PROJECT TO STUDENT<h1>
		</div>
		<div class="container">
		<div class="client">
		<form method="post" action="projectassign.php" id="ProjectAssigned">
		<table align="center">
			<tr>
				<td><b>SELECT PROJECT</b></td>
				<td>
					<?php
						include('connect.php');
						$query="select PROJECT_NAME,ID from addproject";
						 $result = mysqli_query ($con,$query);
					?>
					<select name='project' id='project' type="option" onchange="StudentAlreadyAssigned(this.value)">
					<option value=''>Select Project</option>
					<?php
						while($row = mysqli_fetch_array($result))
						{
							echo"<option value='$row[ID]'>$row[PROJECT_NAME]</option>";
						}
						echo "</select>";
						mysqli_close($con);
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><div id="ListOfStudentAlreadyAssigned"><p> Student Already Assigned Selected Project  will be listed here...</p></div></td>
			</tr>
			</tr>
			<tr>
				<td><b>SELECT NUMBER OF STUDENTS</b></td>
				<td><select name="number" id="number" type="option" onchange="getStudentList(this.value)">
						<option value="">Select a number:</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>	
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><div id="studentList"><p>No. of Student  will be listed here...</p></div></td>
				</tr>
			<tr>
				<td class="button" align="center"><input type="button" value="Assign Project" onclick="validateAndSubmit()"/></td>
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

	function StudentAlreadyAssigned(project)
	{
		var url="DisplayStudents.php?project="+project;
		var req=getXMLHttp();
		if(req)
		{
					req.onreadystatechange=function()
					{
						if(req.readyState==4)
						{
							if(req.status==200)
							{
								document.getElementById("ListOfStudentAlreadyAssigned").innerHTML=req.responseText;
							}
						}
					}
					req.open("GET",url,true);
					req.send();
		}
	}

	function getStudentList(count)
	{
		var url="findStudents.php?count="+count;
		var req=getXMLHttp();
		if(req)
		{
					req.onreadystatechange=function()
					{
						if(req.readyState==4)
						{
							if(req.status==200)
							{
								document.getElementById("studentList").innerHTML=req.responseText;
							}
						}
					}
					req.open("GET",url,true);
					req.send();
		}
	}

	function validateAndSubmit()
	{  
		var studList=[];
		
		var proj=document.getElementById("project").value;
		if(proj.trim()=="")
		{
			alert("project not selected");
				return;
		}
		var count = document.getElementById("number").value;
		if(count.trim()=="")
		{
			alert("No. of student not selected");
				return;
		}
		else
		{
			for(var i=1;i<=count;i++)
			{
				var studentId="student"+i;
				var stud=document.getElementById(studentId).value;
				if(stud.trim()=="")
				{
					alert("student not selected");
					return;
				}
			
				for(var j=0;j<studList.length;j++)
				{
					if(studList[j]==stud)
					{
						alert("student is already selected");
						return;
					}
				}
			studList.push(stud);
			}
		}
		document.getElementById("ProjectAssigned").submit();
	}
</script>
</html>