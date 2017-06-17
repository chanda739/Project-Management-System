<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
	$project=$_GET['project'];
	include('connect.php');
	$query="select STUDENT_ID from projectassign where PROJECT_ID='$project'";
	$result = mysqli_query ($con,$query);
	if(mysqli_num_rows($result)==0)
	{
		echo "No students assigned to this project";
	}
	else
	{
?>
<table>
<?php
		
	while($row = mysqli_fetch_array($result))
	{
		$query1="select FIRST_NAME from student where ID='$row[STUDENT_ID]'";
		$result1 = mysqli_query ($con,$query1);	
		$row1= mysqli_fetch_array($result1);
		echo $row1['FIRST_NAME'];
?>
		<br/>
<?php
	}
?>
</table>
<?php
}
mysqli_close($con);
?>