 <?php 
  include('connect.php');
  if(isset($_POST['button']))
  {
	$passwordvalue=$_POST['cur_pwd'];
	$password=$_POST['password'];
	$confirm_pwd=$_POST['confirm_pwd']; 
	$query="select * from login ";
	$result=mysqli_query($con,$query);
	$row= mysqli_fetch_array($result);
	 $data_pwd=$row['PASSWORD'];
		if($password==$confirm_pwd && $data_pwd==$passwordvalue)
		{
			$query1="update login set PASSWORD='$password'";
			mysqli_query($con,$query1);
			echo"Password changed";
		}
		else
		{
			echo"Password not match plz try again";
		}
  }
  mysqli_close($con);
  $_SESSION['login']=true;
  header('location:success.php');
 ?>