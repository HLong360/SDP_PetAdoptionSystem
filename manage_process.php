<?php

$mysqli = new mysqli("localhost","root","","sdp_pet_adoption") or die(mysli_error($mysqli));

$id=3;
$name = "";
$gender = "";
$phone = "";
$email = "";
$address = "";






if(isset($_POST['save'])){
	
	
	
}


if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$result = $mysqli->query("SELECT * FROM customers where Id=$id") or die($mysqli->error());
	//if(count($result)==1){
	$row = $result->fetch_array();
	$name = $row['Name'];
	$gender = $row['Gender'];
	$phone = $row['Phone'];
	$email = $row['Email'];
	$address = $row['Address'];
	
	
	
	
	
	
}		

	
if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['Name'];
	$gender = $_POST['Gender'];
	$phone = $_POST['Phone'];
	$email = $_POST['Email'];
	$address = $_POST['Address'];
	
	
	$mysqli->query("UPDATE `customers` SET Name='$name',Gender='$gender', Phone='$phone',Email='$email',Address='$address' WHERE Id=$id ")or die($mysqli->error);
	
	// $_SESSION['message'] = "Record has been updated";
	// $_SESSION['msg_type'] = "warning";
	
	
	header('location:Manage_customers.php');
	
	
	
}