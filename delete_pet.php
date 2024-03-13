<?php
	include("session.php");
	if($_SESSION["level"] == "Manager" || $_SESSION["level"] == "Employee"){
        include("conn.php");
		$id = intval($_GET['pet_id']);
		$sql_result = mysqli_query($con, "SELECT pet_pic FROM pets WHERE pet_id = $id;");
		$row = mysqli_fetch_array($sql_result);
		$pic_name = $row['pet_pic'];
		unlink('petsImg/'.$pic_name); 
		$result = mysqli_query($con,"DELETE FROM pets WHERE pet_id=$id;");
		mysqli_close($con); 
		header('Location: view_pet.php'); 
    }else{
		echo "<script>alert('Please login as a staff!'); window.location.href='login.php';</script>";
	}
		
	
?>