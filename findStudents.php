<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('location:index.php');
	}	
	$count=$_GET['count'];
	//$count=4;
	include('connect.php');
?>
<link rel="stylesheet" href="stylelay.css" type="text/css">
<div class="student">
<table>
	<?php
	for($i=1;$i<=$count;$i++)
	{
		$query="select ID,FIRST_NAME from student where PROJECT='UNASSIGNED'";
		$result = mysqli_query ($con,$query);
		?>
		<tr>
			<td><b>Student <?php echo $i; ?></b></td>
			<td>
				<select name="student<?php echo $i; ?>" id='student<?php echo $i; ?>' type='option'>
				<option value=''>Select Student</option>
				<?php
				while($row = mysqli_fetch_array($result))
				{
					?>
					<option value='<?php echo $row['ID']?>'><?php echo $row['FIRST_NAME'] ?></option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>
		<?php
	}
	mysqli_close($con);
?>
</table>
</div>
 	