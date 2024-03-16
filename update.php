<?php 
include"connection.php";
$id=$_GET['id'];
$select=mysqli_query($con,"select * from foods where food_id='$id'");
$row=mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html>
<head>

	<title>welcome to manager sign up</title>
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
	table tr{
		background-color: black;
		color: white;
	}
	


</style>
</head>
<body>
<form action="" method="POST">
	<div class="header">
	<h3>DUKUNDUMURIMO UPDATE</h3></div>
	<div class="content">
		<fieldset>
			<h3>DUKUNDUMURIMO UPDATE</h3>
		<label>food_id:</label><br>
	<input type="number" name="food_id" value="<?php echo $row['food_id']; ?>"><br>
	<label>food_name:</label><br>
	<input type="text" name="food_name" value="<?php echo $row['food_name']; ?>"><br>
	<label>food_owner_name:</label><br>
	<input type="text" name="food_owner_name" value="<?php echo $row['food_owner_name']; ?>"><br>
	<input type="submit" name="update" value="update">
	<input type="reset" value="CLEAR"><br><br>

</fieldset>
</div>
	

</form>

</body>
</html>
<?php
include"connection.php";
if(isset($_POST['update'])){
	$food_id=$_POST['food_id'];
	$food_name=$_POST['food_name'];
	$food_owner_name=$_POST['food_owner_name'];
	$update=mysqli_query($con,"update foods set food_name='$food_name',food_owner_name='$food_owner_name' where food_id='$food_id'");
	if ($update) {
		echo"<script>alert('food updated seccessful')</script>";
		header('location:foods.php');
	}else{
		die("not updated".mysqli_error($con));
	}
}
?>
