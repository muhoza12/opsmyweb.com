<!DOCTYPE html>
<html>
<head>

	<title>welcome to manager sign up</title>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
		text-decoration: none;

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
		height: 40px;
		width: 30%;
	}
	table td{
		background-color: gray;
		color: black;
		font-weight: bold;
	}
	table{
		margin-left: 300px;
		border-radius: 7px;
		margin-top: 50px;
		margin-bottom: 30px;
		width: 47%;
	}
	.delete{
		background-color: crimson;
		font-color: white;
		height: 30px;
		width: 90%;
		text-align: center;
		border-radius: 5px;
		text-decoration: none;
	}
		.update{
		background-color: green;
		font-color: white;
		height: 30px;
		width: 90%;
		text-align: center;
		border-radius: 5px;
		text-decoration: none;
	}

	table tr td a{
		color: white;
	}


</style>
</head>
<body>
<form action="" method="POST">
	<div class="header">
	<h3>WELCOME TO DUKUNDUMURIMO</h3></div>
	<div class="content">
		<fieldset>
			<h3>WELCOME TO DUKUNDUMURIMO</h3>
		<label>food_id:</label><br>
	<input type="number" name="food_id"><br>
	<label>food_name:</label><br>
	<input type="text" name="food_name"><br>
	<label>food_owner_name:</label><br>
	<input type="text" name="food_owner_name"><br>
	<input type="submit" name="send" value="input">
	<input type="reset" value="CLEAR"><br><br>

</fieldset>
</div>
	

</form>

</body>
</html>
<?php
include"connection.php";
if(isset($_POST['send'])){
	$food_id=$_POST['food_id'];
	$food_name=$_POST['food_name'];
	$food_owner_name=$_POST['food_owner_name'];
	$insert=mysqli_query($con,"insert into foods values('$food_id','$food_name','$food_owner_name')");
	if ($insert) {
		echo"<script>alert('$food_name from $food_owner_name inserted seccessful')</script>";
	}else{
		die("not inserted".mysqli_error($con));
	}
}
$select=mysqli_query($con,"select * from foods");
if(mysqli_num_rows($select)){
	echo"<table border='2'>";
	echo"<tr><th>FOOD_ID</th><th>FOOD_NAME</th><th>FOOD_OWNER_NAME</th><th colspan='2'>EDIT</th></tr>";
	while ($row=mysqli_fetch_array($select)) {
		echo"<tr>";
		echo"<td>".$row['food_id']."</td>";
		echo"<td>".$row['food_name']."</td>";
		echo"<td>".$row['food_owner_name']."</td>";
		echo"<td><div class='delete'><a href='delete.php?id=".$row['food_id']."'>delete<a/></div>
		<td><div class='update'><a href='update.php?id=".$row['food_id']."'>update<a/></div></td>";
		echo"</tr>";
	}
}

?>
