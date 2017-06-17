 <?php 
  session_start();
  include('connect.php');
  $username=$_POST['uname'];
  $password=$_POST['pswd'];
  $confirm_pwd=$_POST['pwd'];
	if($password==$confirm_pwd)
	{
	$query="insert into login(USERNAME,PASSWORD) values('$username','$password')";
	$result=mysqli_query($con,$query);
	}
  mysqli_close($con);
  $_SESSION['login']=true;
	header('location:success.php');
 ?>