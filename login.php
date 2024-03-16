<?PHP
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>welcome to Login form</title>
	<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;

	}
	.header {
		background-color: black;
		height: 90px;
		width:100%;
		position: fixed;
		top: 0px;

	}
	.header h3{
		color: navajowhite;
		font-family: tahoma;
		font-size: 50px;
		margin-left: 300px;
		margin-top: 15px;
		text-shadow: gray 2px 2px;
	}
	.content fieldset{
		margin-top: 100px;
		width: 47%;
		height: 400px;
		background-color: black;
		color: white;
		margin-left: 300px;
		text-align: center;
		border-radius: 12px;

	}
	.content h3{
		font-family: tahoma;
		margin-top: 20px;
		font-size: 30px;
		color: navajowhite;
	}
	.content label{
		font-family: cambria;
		position: relative;
		top: 10px;
		font-size: 20px;
	}
	.content input[type=text]{
		height: 25px;
		width: 50%;
		border-radius: 8px;
		margin-top: 10px;

	}
	.content input[type=number]{
		height: 25px;
		width: 50%;
		border-radius: 8px;
		margin-top: 10px;

	}
	.content input[type=password]{
		height: 25px;
		width: 50%;
		border-radius: 8px;
		margin-top: 10px;

	}
		.content input[type=submit]{
		height: 30px;
		width: 12%;
		border-radius: 5px;
		margin-top: 10px;
		background-color: olive;
		

	}
		.content input[type=reset]{
		height: 30px;
		width: 12%;
		border-radius: 5px;
		margin-top: 10px;
		background-color: salmon;
		

	}
	.content input[type=submit]:hover{
		background-color: green;
		transition: 1.3s;
		

	}
		.content input[type=reset]:hover{
		background-color: crimson;
		transition: 1.3s;
		

	}
	.content p{
		font-family: cambria;
		font-size: 20px;
	}
	.content p a{
		color: blue;

	}
	.content p a:hover{
		color: red;
		transition: 1.3s;

	}
	


</style>
</head>
<body>
<form action="" method="POST">
	<div class="header">
	<h3>MANAGER LOGIN FORM</h3>
</div>
<div class="content">
<fieldset>
	<h3>MANAGER LOGIN FORM</h3>
	<label>Username:</label><br>
	<input type="text" name="username"><br>
	<label>Password:</label><br>
	<input type="password" name="password"><br>
	<input type="submit" name="login" value="LOGIN">
	<input type="reset" value="CLEAR"><br><br>
	<p>Don't have an account? <a href="manager_signup.php">signup</a>
	</p>

</fieldset>
	</div>

</form>

</body>
</html>
<?php
include"connection.php";
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$select=mysqli_query($con,"select * from manager where username='$username' and password='$password'");
	if(mysqli_num_rows($select)){
		$row=mysqli_fetch_array($select);
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$row['password'];
		echo "<script>alert('login successful')</script>";
		header('location:foods.php');

	}else{
		echo"<script>alert('incorrect username or password')</script>";
	}


}
?>