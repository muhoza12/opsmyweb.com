<?php 
include"connection.php";
$id=$_GET['id'];
$delete=mysqli_query($con,"delete from foods where food_id='$id'");
header('location:foods.php');
?>